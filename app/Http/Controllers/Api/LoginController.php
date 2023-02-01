<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Traits\HttpResponse;
use Auth;

class LoginController extends Controller
{
    use HttpResponse;

    public function index(LoginRequest $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                return $this->success([
                    'user' => $user,
                    'token' => $user->createToken('myApp')->plainTextToken,
                ], 'Login Successful');
            } else {
                return $this->error('', 'Invalid Credentials');
            }
        } catch (\Throwable $e) {
            return $this->internalError($e->getMessage());
        }
    }

    public function logout()
    {
        try {
            Auth::user()->currentAccessToken()->delete();

            return $this->success('', 'Logout success,token deleted');
        } catch (\Throwable $e) {
            return $this->internalError($e->getMessage());
        }
    }
}
