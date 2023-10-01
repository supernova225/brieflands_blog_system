<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

/**
 * @group Auth
 */
class AuthController extends Controller
{
    /**
     * Auth Register
     *
     * @bodyParam first_name string required
     * @bodyParam last_name string required
     * @bodyParam email email required
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     *
     */
    public function register(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = $user->createToken('my_blog_system')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    /**
     * Auth Login
     *
     * @bodyParam email email required
     * @bodyParam password string required
     *
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw new AuthenticationException(['message' => __('password.user')]);
        }

        if (!\Hash::check($request->password, $user->password)) {
            throw new AuthenticationException(['message' => __('auth.password')]);
        }

        $token = $user->createToken('my_task_management')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response);
    }


    /**
     * Auth Logout
     *
     *
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response(__('auth.logout'));
    }
}
