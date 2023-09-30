<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group Users
 */
class UpdateUserController extends Controller
{
    /**
     * Users Update
     *
     * @bodyParam first_name string required
     * @bodyParam last_name string required
     * @bodyParam email string required
     *
     *
     */
    public function update(UpdateUserRequest $request, User $user = null)
    {
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return response(['message' => 'کاربر با موفقیت ویرایش شد.']);
    }

}
