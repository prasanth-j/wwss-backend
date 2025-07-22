<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class BlogPost extends Model
{
    use Searchable;

    protected $fillable = [
        'title',
        'body',
        'tags',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'published_at' => 'datetime',
        ];
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'tags' => is_array($this->tags) ? implode(' ', $this->tags) : '',
            'published_at' => $this->published_at?->toDateString(),
        ];
    }

    public function shouldBeSearchable(): bool
    {
        return ($this->published_at !== null) && $this->published_at->isPast();
    }

    public function searchableAs(): string
    {
        return 'blog_post';
    }
}
