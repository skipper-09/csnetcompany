<?php

namespace App\Http\Controllers\Backend\Media;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequest;
use App\Models\Media;
use App\Models\Promo;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class MediaController extends Controller
{
    public function index()
    {
        $auth = Auth::user()->roles[0]->name;
        $data = [
            'sidebar' => 'media',
            'page_name' => 'Media',
            'media' => Media::where('usertype', $auth)->get()
        ];
        return view('backend.media.index', $data);
    }

    public function getData()
    {
        $query = Media::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.media.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';
            $button .= ' <a href="' . route('backend.media.detail', ['slug' => $query->slug]) . '" class="btn btn-sm btn-primary action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Lihat Data"><i
                                                        class="fas fa-eye"></i></a>';
            $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.media.delete', ['id' => $query->id]) . '"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->make(true);
    }


    public function detail($slug)
    {
        $query = Media::where('slug', $slug)->get();
        $data = [
            'sidebar' => 'media',
            'page_name' => 'Media',
            'media' => $query
        ];
        return view('backend.media.detail', $data);
    }


    public function showFile($filename)
    {
        // Validasi apakah file ada dan pengguna berhak mengakses
        $filePath = public_path('/storage/file/' . $filename);

        // Jika file tidak ditemukan, atau tidak ada izin, tampilkan 404
        if (!file_exists($filePath)) {
            abort(404);
        }

        // Cek otorisasi pengguna di sini, jika diperlukan
        // Contoh: jika hanya admin yang boleh mengakses
        // if (auth()->user()->role !== 'admin') {
        //     abort(403, 'Unauthorized action.');
        // }

        // Stream file PDF tanpa memberikan URL file yang asli
        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
            'X-Content-Type-Options' => 'nosniff'
        ]);
    }


    public function create()
    {
        $data = [
            'sidebar' => 'media',
            'page_name' => 'Media',
            'role' => Role::whereNotIn('name', ['Developer', 'Administrator'])->get()
        ];
        return view('backend.media.add', $data);
    }

    public function store(MediaRequest $request)
    {
        try {
            $request->validated();

            $filename = '';
            if ($request->hasFile('pdf')) {
                $file  = $request->file('pdf');
                $filename = 'file_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/file/'), $filename);
            }
            $slug = Str::slug($request->name);
            Media::create([
                'name' => $request->name,
                'type' => $request->type == '' ? '' : $request->type,
                'pdf' => $filename,
                'url' => $request->url == '' ? '' : $request->url,
                'usertype' => $request->usertype,
                'slug' => $slug
            ]);
            return redirect()->route('backend.media')->with(['success' => 'Berhasil Menambahkan Media!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }


    public function show(Media $media, $id)
    {
        $data = [
            'sidebar' => 'media',
            'page_name' => 'Media',
            'role' => Role::whereNotIn('name', ['Developer'])->get(),
            'media' => $media->find($id),
        ];
        return view('backend.media.edit', $data);
    }


    public function update(MediaRequest $request, $id)
    {
        try {
            $request->validated();
            $data = media::find($id);
            $filename = '';
            if ($request->hasFile('pdf')) {
                $file  = $request->file('pdf');
                $filename = 'file_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/file/'), $filename);
                if (file_exists(public_path('storage/file/' . $data->pdf))) {
                    File::delete(public_path('storage/file/' . $data->pdf));
                }
            }
            $slug = Str::slug($request->name);
            $data->update([
                'name' => $request->name,
                'type' => $request->type == '' ? '' : $request->type,
                'pdf' => $filename,
                'url' => $request->url == '' ? '' : $request->url,
                'usertype' => $request->usertype,
                'slug' => $slug
            ]);
            return redirect()->route('backend.media')->with(['success' => 'Berhasil Menambahkan Media!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $media =  media::where('id', $id)->first();
            if (file_exists(public_path('storage/file/' . $media->pdf))) {
                File::delete(public_path('storage/file/' . $media->pdf));
            }

            $media->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => ' Media Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Media Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
