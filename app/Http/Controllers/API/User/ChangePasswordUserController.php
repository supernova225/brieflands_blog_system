<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\ChangePasswordUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group Users
 */
class ChangePasswordUserController extends Controller
{
    /**
     * Users Change Password
     *
     * @bodyParam old_password string required
     * @bodyParam new_password string required
     * @bodyParam new_password_confirmation string required
     *
     *
     *
     */
    public function changePassword(ChangePasswordUserRequest $request, User $user = null)
    {
        if (!$user) {
            $user = auth()->user();
        }

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => $request->new_password,
            ]);

            return response(['message' => 'رمز عبور کاربر با موفقیت ویرایش شد.']);
        }

        throw new \InvalidArgumentException('رمز وارد شده درست نمی‌باشد.');
    }
}
