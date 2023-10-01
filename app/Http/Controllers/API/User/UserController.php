<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Resources\Users\UserCollection;
use App\Http\Resources\Users\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group Users
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Users List
     *
     * @queryParam limit integer
     * @queryParam page integer
     * @queryParam search string
     * @queryParam is_admin string Enum: admin, user
     * @queryParam email email
     *
     *
     */
    public function index()
    {
        $this->authorize('viewAny');

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

    /**
     * Users Store
     *
     * @bodyParam first_name string required
     * @bodyParam last_name string required
     * @bodyParam email string required
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     *
     *
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return new UserResource($user);
    }

    /**
     * Users Show
     *
     * @urlParam user integer required
     *
     *
     */
    public function show(User $user)
    {
        $this->authorize('view');

        return new UserResource($user);
    }

    /**
     * Users Update
     *
     * @bodyParam first_name string required
     * @bodyParam last_name string required
     * @bodyParam email string required
     *
     *
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return response(['message' => 'کاربر با موفقیت ویرایش شد.']);
    }

    /**
     * Users Delete
     *
     * @urlParam user
     *
     *
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return response(['message' => 'کاربر مورد نظر با موفقیت حذف شد.']);
    }
}
