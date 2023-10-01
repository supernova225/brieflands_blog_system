<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\Posts\PostCollection;
use App\Http\Resources\Posts\PostShowResource;
use App\Models\Post;
use Illuminate\Http\Request;

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
     * @queryParam publication_from date
     * @queryParam publication_to date
     * @queryParam is_published integer
     *
     */
    public function index()
    {
        $limit = \request('limit', 10);

        $page = \request('page', 1);

        [$posts, $cloneQuery] = $this->getPosts($limit, $page);

        return new PostCollection($posts, $limit, $page, $cloneQuery);
    }

    private function getPosts($limit, $page)
    {
        auth()->user()->is_admin == 1
            ?
            $query = Post::query()
            :
            $query = Post::where('user_id', auth()->id());;

        if (\request('search')) {
            $query->where('title', 'like', '%' . \request('search') . '%');
        }

        if (\request('publication_from')) {
            $publicationFrom = \request('publication_from');

            $query->where('publication', '>=', $publicationFrom);
        }

        if (\request('publication_to')) {
            $publicationTo = \request('publication_to');

            $query->where('publication', '<=', $publicationTo);
        }

        if (\request('is_published')) {
            $query->where('is_published', \request('is_published'));
        }

        $cloneQuery = clone $query;

        $posts = $query->take($limit)->skip(($page - 1) * $limit)->get();

        return [$posts, $cloneQuery];
    }

    /**
     * Posts Store
     *
     * @bodyParam title string required
     * @bodyParam main_content string required
     * @bodyParam publication date
     *
     *
     *
     */
    public function store(StorePostRequest $request)
    {
        $user = auth()->user();

        if ($request->publication < now()) {
            throw new \DateException('تاریخ انتشار وارد شده نباید کمتر از تاریخ حال باشد.');
        }

        $post = $user->posts()->create([
            'title' => $request->title,
            'main_content' => $request->main_content,
            'publication' => $request->publication ? $request->publication : now(),
            'is_published' => $request->publication ? 0 : 1,
        ]);

        return $post;
    }

    /**
     * Posts Show
     *
     * @urlParam post integer required
     *
     */
    public function show(Post $post)
    {
        return new PostShowResource($post);
    }

    /**
     * Posts Update
     *
     * @urlParam post integer required
     *
     * @bodyParam title string required
     * @bodyParam main_content string required
     * @bodyParam publication date
     *
     *
     *
     *
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'main_content' => $request->main_content,
            'publication' => $request->publication ? $request->publication : $post->publication,
            'is_published' => $request->publication ? 0 : 1,
        ]);

        return response(['message' => 'پست مورد نظر ویرایش شد.']);
    }

    /**
     * Posts Delete
     *
     * @urlParam post integer required
     *
     *
     *
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response(['message' => 'پست مورد نظر با موفقیت حذف شد.']);
    }
}
