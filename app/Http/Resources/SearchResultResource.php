<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource['id'],
            'type' => $this->resource['type'],
            'title' => $this->resource['title'],
            'snippet' => $this->resource['snippet'],
            'link' => $this->resource['link'],
            'meta' => $this->resource['meta'],
            'relevance_score' => $this->resource['relevance_score'],
            'created_at' => $this->resource['created_at']?->format('Y-m-d H:i:s'),
        ];
    }
}
