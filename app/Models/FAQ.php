<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class FAQ extends Model
{
    use Searchable;

    protected $table = 'faqs';

    protected $fillable = [
        'question',
        'answer',
    ];

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->answer,
        ];
    }

    public function searchableAs(): string
    {
        return 'faq';
    }
}
