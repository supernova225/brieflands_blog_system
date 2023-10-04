<?php

namespace App\Http\Resources\Posts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'author' => [
                'id' => $this->author?->id,
                'first_name' => $this->author?->first_name,
                'last_name' => $this->author?->last_name,
            ],
            'id' => $this->id,
            'title' => $this->title,
            'main_content' => $this->main_content,
            'publication_date' => $this->publication_date,
            'is_published' => config('settings.posts.' . $this->is_published),
        ];
    }
}
