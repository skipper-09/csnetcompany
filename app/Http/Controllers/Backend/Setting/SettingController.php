<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    private string $page_name = 'Setting';

    public function index()
    {
        return view('backend.settings.settings.index', ['page_name' => $this->page_name]);
    }

    public function getData()
    {
        $query = Setting::query()->orderBy('group')->orderBy('key');

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('group', fn($s) => e($s->group ?? '-'))
            ->editColumn('key', fn($s) => '<code>' . e($s->key) . '</code>')
            ->editColumn('label', function ($s) {
                $html = '<div class="fw-semibold">' . e($s->label) . '</div>';
                if ($s->description) {
                    $html .= '<small class="text-muted text-wrap d-block" style="max-width:260px">' . e($s->description) . '</small>';
                }
                return $html;
            })
            ->addColumn('type_label', function ($s) {
                $color = $s->isSecret() ? 'warning' : 'secondary';
                return '<span class="badge bg-label-' . $color . '">' . e(Setting::TYPES[$s->type] ?? $s->type) . '</span>';
            })
            ->addColumn('value_display', function ($s) {
                if (!$s->hasValue()) {
                    return '<span class="text-muted">-</span>';
                }
                if ($s->isSecret()) {
                    return '<span class="text-muted">••••••••</span>';
                }
                return e(Str::limit($s->value, 50));
            })
            ->addColumn('action', function ($s) {
                $html = '<div class="d-flex gap-1">';

                if (auth()->user()->can('update-settings')) {
                    $html .= '<a href="' . route('backend.settings.edit', $s->id) . '" class="btn btn-sm btn-warning">Edit</a>';
                }

                if (auth()->user()->can('delete-settings')) {
                    $html .= '<form action="' . route('backend.settings.delete', $s->id) . '" method="POST" onsubmit="return confirm(\'Hapus setting ini?\')">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-sm btn-danger">Hapus</button></form>';
                }

                return $html . '</div>';
            })
            ->rawColumns(['key', 'label', 'type_label', 'value_display', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('backend.settings.settings.create', ['page_name' => $this->page_name]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'group' => ['nullable', 'string', 'max:50'],
                'key' => ['required', 'string', 'max:100', 'regex:/^[a-z0-9_.]+$/', 'unique:settings,key'],
                'label' => ['required', 'string', 'max:150'],
                'type' => ['required', Rule::in(array_keys(Setting::TYPES))],
                'value' => $this->valueRules($request->input('type')),
                'description' => ['nullable', 'string', 'max:255'],
            ],
            [
                'key.regex' => 'Key hanya boleh huruf kecil, angka, titik, dan underscore.',
            ],
        );

        $setting = new Setting();
        $setting->fill($data); // type di-set dulu
        $setting->value = $data['value'] ?? null;
        $setting->save();

        return redirect()->route('backend.settings')->with('success', 'Setting berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);

        return view('backend.settings.settings.edit', [
            'page_name' => $this->page_name,
            'setting' => $setting,
        ]);
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $data = $request->validate([
            'group' => ['nullable', 'string', 'max:50'],
            'label' => ['required', 'string', 'max:150'],
            'type' => ['required', Rule::in(array_keys(Setting::TYPES))],
            'value' => $this->valueRules($request->input('type')),
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        $nilaiLama = $setting->value;

        $setting->fill($data);

        $nilaiBaru = filled($data['value'] ?? null) ? $data['value'] : ($setting->isSecret() ? $nilaiLama : null);

        $setting->value = $nilaiBaru;
        $setting->save();

        return redirect()->route('backend.settings')->with('success', 'Setting berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Setting::findOrFail($id)->delete();

        return redirect()->route('backend.settings')->with('success', 'Setting berhasil dihapus.');
    }

    public function show($id)
    {
        return $this->edit($id);
    }

    private function valueRules(?string $type): array
    {
        return match ($type) {
            'url' => ['nullable', 'url', 'max:2000'],
            'number' => ['nullable', 'numeric'],
            default => ['nullable', 'string', 'max:5000'],
        };
    }
}
