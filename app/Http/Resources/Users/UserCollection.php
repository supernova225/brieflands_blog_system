<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
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
            'data' => UserResource::collection($this->data),
            'limit' => $this->limit,
            'page' => $this->page,
            'total' => $this->cloneQuery->count(),
        ];
    }
}
