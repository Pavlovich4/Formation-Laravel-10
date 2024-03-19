<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'is_published', 'image', 'user_id'
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

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['image'] ? asset('storage/' . $attributes['image']) : 'https://fakeimg.pl/600x400/4657d9/ffffff'
        );
    }

    protected function title(): Attribute
    {
        return Attribute::set(fn($value) => str($value)->title());
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted(): void
    {
        static::creating(function (Post $post) {
            $post->slug = str($post->title)->slug();
        });
    }
}
