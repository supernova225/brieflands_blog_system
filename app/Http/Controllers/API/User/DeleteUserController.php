<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group Users
 */
class DeleteUserController extends Controller
{
    public function delete(User $user)
    {
        $user->delete();

        return response(['message' => 'کاربر مورد نظر با موفقیت حذف شد.']);
    }
}
