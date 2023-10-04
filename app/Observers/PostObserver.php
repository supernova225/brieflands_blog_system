<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\PostLog;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        $modifierUser = auth()->user();

        \Log::info("User with name {$modifierUser->first_name} {$modifierUser->last_name} with ID {$modifierUser->id} updated post with ID {$post->id} and author {$post->author->first_name} {$post->author->first_name}");


        // $postLog = PostLog::create([
        //     'modifier_id' => $modifierUser->id,
        //     'modifier_first_name' => $modifierUser->first_name,
        //     'modifier_last_name' => $modifierUser->last_name,
        //     'modify_type' => 'update',
        //     'post_id' => $post->id,
        //     'author_id' => $post->author->id,
        //     'author_first_name' => $post->author->first_name,
        //     'author_last_name' => $post->author->last_name,
        // ]);
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        $modifierUser = auth()->user();

        \Log::info("User with name {$modifierUser->first_name} {$modifierUser->last_name} with ID {$modifierUser->id} deleted post with ID {$post->id} and author {$post->author->first_name} {$post->author->first_name}");
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
