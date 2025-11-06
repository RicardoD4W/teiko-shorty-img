<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Image extends Model
{
    protected $fillable = ['filename', 'mime', 'data', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($image) {
            do {
                $slug = Str::random(16);
            } while (self::where('slug', $slug)->exists());

            $image->slug = $slug;
        });
    }
}
