<?php

namespace App\Http\Controllers\API\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\Posts\PostCollection;
use App\Http\Resources\Posts\PostResource;
use App\Http\Resources\Posts\PostShowResource;
use App\Models\Post;

/**
 * @group Posts
 */
class PostController extends Controller
{
    /**
     * Posts List
     *
     * @queryParam limit integer
     * @queryParam page integer
     * @queryParam search string
     * @queryParam publication_date_from date
     * @queryParam publication_date_to date
     * @queryParam is_published integer
     *
     */
    public function index()
    {
        // dd(\Log::getLogger());
        auth()->user()->role == 'admin'
            ? $query = Post::filter()
            : $query = Post::filter()->where('author_id', auth()->id());

        $limit = \request('limit', 10);

        $page = \request('page', 1);

        $cloneQuery = clone $query;

        $posts = $query->orderBy('id', 'asc')->take($limit)->skip(($page - 1) * $limit)->get();

        return new PostCollection($posts, $limit, $page, $cloneQuery);
    }

    /**
     * Posts Store
     *
     * @bodyParam title string required
     * @bodyParam main_content string required
     * @bodyParam publication date
     *
     */
    public function store(StorePostRequest $request)
    {
        $post = auth()->user()->posts()->create([
            'title' => $request->title,
            'main_content' => $request->main_content,
            'publication_date' => $request->publication_date ? $request->publication_date : now()->format('Y-m-d'),
            'is_published' => $request->publication_date ? 0 : 1,
        ]);

        return new PostResource($post);
    }

    /**
     * Posts Show
     *
     * @urlParam post integer required
     *
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        return new PostShowResource($post);
    }

    /**
     * Posts Update
     *
     * @urlParam post integer required
     *
     * @bodyParam title string required
     * @bodyParam main_content string required
     * @bodyParam publication_date date
     *
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        if ($request->publication_date < now()) {
            throw new \DateException(__('posts.exceptions.wrong_publication_date'));
        }

        $post->update([
            'title' => $request->title,
            'main_content' => $request->main_content,
            'publication_date' => $request->publication_date ? $request->publication_date : $post->publication,
            'is_published' => $request->publication_date ? 0 : 1,
        ]);

        return response(__('posts.messages.update'));
    }

    /**
     * Posts Delete
     *
     * @urlParam post integer required
     *
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response(__('posts.messages.delete'));
    }
}
