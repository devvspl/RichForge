<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'author',
        'published_at',
        'is_published',
        'meta_title',
        'meta_description',
        'focus_keyword',
        'canonical_url',
        'robots',
        'featured_image',
        'featured_image_alt',
        'og_title',
        'og_description',
        'og_image',
        'category',
        'tags',
        'faqs',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'faqs' => 'array',
    ];

    // Dynamic fallbacks for SEO
    public function getEffectiveMetaTitleAttribute(): string
    {
        return $this->meta_title ?: $this->title;
    }

    public function getEffectiveMetaDescriptionAttribute(): string
    {
        return $this->meta_description ?: ($this->excerpt ?: Str::limit(strip_tags($this->content), 160));
    }

    public function getEffectiveOgTitleAttribute(): string
    {
        return $this->og_title ?: $this->effective_meta_title;
    }

    public function getEffectiveOgDescriptionAttribute(): string
    {
        return $this->og_description ?: $this->effective_meta_description;
    }

    public function getEffectiveOgImageAttribute(): ?string
    {
        return $this->og_image ?: $this->featured_image;
    }
}
