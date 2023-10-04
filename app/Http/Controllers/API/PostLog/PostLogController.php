<?php

namespace App\Http\Controllers\API\PostLog;

use App\Http\Controllers\Controller;
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
     * @queryParam modify_type
     * @queryParam post_id
     * @queryParam author_first_name string
     * @queryParam author_last_name string
     *
     *
     *
     *
     *
     *
     *
     */
    public function index()
    {
        $query = PostLog::filter();



        return $query->get();

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
