<?php

namespace App\Http\Controllers\API\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublishedPosts\PublishedPostCollection;
use App\Http\Resources\PublishedPosts\PublishedPostShowResource;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * @group Publish Posts
 */
class PublishPostController extends Controller
{
    /**
     * Published Posts List
     *
     * @queryParam limit integer
     * @queryParam page integer
     * @queryParam search string
     * @queryParam publication_date_from date
     * @queryParam publication_date_to date
     *
     */
    public function index()
    {
        $limit = \request('limit', 10);

        $page = \request('page', 1);

        $query = Post::filter()->where('is_published', 1);

        $cloneQuery = clone $query;

        $posts = $query->take($limit)->skip(($page - 1) * $limit)->get();

        return new PublishedPostCollection($posts, $limit, $page, $cloneQuery);
    }

    /**
     * Published Posts Show
     *
     * @urlParam post integer required
     *
     */
    public function show(int $post)
    {
        $publishedPost = Post::where('id', $post)->where('is_published', 1)->first();

        if (!$publishedPost) {
            throw new \InvalidArgumentException(__('posts.exceptions.post_not_available'), 404);
        }

        return new PublishedPostShowResource($publishedPost);
    }
}
