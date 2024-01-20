<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'is_published', 'image'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'title' => 'string',
    ];

    /*public function getRouteKeyName(): string
    {
        return 'slug';
    }*/

    public function scopeIsPublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    protected static function booted(): void
    {
        static::creating(function (Post $post) {
            $post->slug = str($post->title)->slug();
        });
    }
}
