<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class Setting extends Model
{
    public const CACHE_KEY = 'app_settings';

    public const TYPES = [
        'text' => 'Teks',
        'url' => 'URL',
        'number' => 'Angka',
        'textarea' => 'Teks Panjang',
        'password' => 'Password',
        'token' => 'Token / API Key',
    ];

    public const SECRET_TYPES = ['password', 'token'];

    protected $fillable = ['group', 'key', 'label', 'type', 'description'];

    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget(self::CACHE_KEY));
        static::deleted(fn() => Cache::forget(self::CACHE_KEY));
    }

    public function isSecret(): bool
    {
        return in_array($this->type, self::SECRET_TYPES, true);
    }

    protected function value(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                if (blank($value) || !in_array($attributes['type'] ?? null, self::SECRET_TYPES, true)) {
                    return $value;
                }

                try {
                    return Crypt::decryptString($value);
                } catch (DecryptException) {
                    return null;
                }
            },
            set: function ($value, $attributes) {
                if (blank($value)) {
                    return null;
                }

                return in_array($attributes['type'] ?? null, self::SECRET_TYPES, true) ? Crypt::encryptString($value) : $value;
            },
        );
    }

    public function hasValue(): bool
    {
        return filled($this->getRawOriginal('value'));
    }

    public static function get(string $key, $default = null)
    {
        $all = Cache::rememberForever(self::CACHE_KEY, fn() => self::all()->keyBy('key'));

        return $all->get($key)?->value ?? $default;
    }
}
