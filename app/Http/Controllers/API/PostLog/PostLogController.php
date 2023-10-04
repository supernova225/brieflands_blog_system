<?php

namespace App\Http\Controllers\API\PostLog;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostLogs\PostLogCollection;
use App\Models\PostLog;
use Illuminate\Http\Request;

/**
 * @group Post Logs
 */
class PostLogController extends Controller
{
    /**
     * Post Logs List
     *
     * @queryParam modifier_first_name string
     * @queryParam modifier_last_name string
     * @queryParam modify_type string The modify type value is between update and delete
     * @queryParam post_id integer
     * @queryParam author_first_name string
     * @queryParam author_last_name string
     *
     */
    public function index()
    {
        $limit = \request('limit', 10);

        $page = \request('page', 1);

        $query = PostLog::filter();

        $cloneQuery = clone $query;

        $postLogs = $query->take($limit)->skip(($page - 1) * $limit)->get();

        return new PostLogCollection($postLogs, $limit, $page, $cloneQuery);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
