<?php

namespace App\Http\Resources\PublishedPosts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PublishedPostShowResource extends JsonResource
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
                'id' => $this->user->id,
                'first_name' => $this->user->first_name,
                'last_name' => $this->user->last_name,
            ],
            'id' => $this->id,
            'title' => $this->title,
            'main_content' => $this->main_content,
            'publication_date' => $this->publication_date,
        ];
    }
}
