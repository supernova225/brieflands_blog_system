<?php

namespace App\Http\Resources\PostLogs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'modifier_id' => $this->modifier->id,
            'modifier_first_name' => $this->modifier->first_name,
            'modifier_last_name' => $this->modifier->last_name,
            'modify_type' => $this->modify_type,
            'post_id' => $this->post->id,
            'author_id' => $this->author->id,
            'author_first_name' => $this->author->first_name,
            'author_last_name' => $this->author->last_name,
        ];
    }
}
