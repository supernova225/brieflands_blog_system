<?php

namespace App\Http\Resources\Posts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    public function __construct(private $data, private $limit, private $page, private $cloneQuery)
    {
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => PostResource::collection($this->data),
            'limit' => $this->limit,
            'page' => $this->page,
            'total' => $this->cloneQuery->count(),
        ];
    }
}
