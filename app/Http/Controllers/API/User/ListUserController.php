<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group Users
 */
class ListUserController extends Controller
{
    public function list()
    {
        $limit = \request('limit', 10);

        $page = \request('page', 1);

        [$users, $cloneQuery] = $this->getUsers($limit, $page);

        return new UserCollection($users, $limit, $page, $cloneQuery);
    }

    private function getUsers($limit, $page)
    {
        $query = User::query();

        if (\request('search')) {

            $search = \request('search');

            $query
                ->where('first_name', '%' . $search . '%')
                ->orWhere('last_name', '%' . $search . '%');
        }

        if (\request('is_admin')) {
            $query->where('is_admin', \request('is_admin'));
        }

        if (\request('email')) {
            $query->where('email', '%' . \request('email') . '%');
        }

        $cloneQuery = clone $query;

        $users = $query->take($limit)->skip(($page - 1) * $limit)->get();

        return [$users, $cloneQuery];
    }
}
