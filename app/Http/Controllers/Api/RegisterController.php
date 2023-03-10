<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Traits\HttpResponse;
use App\Models\User;

class RegisterController extends Controller
{
    use HttpResponse;

    public function index(RegisterRequest $request)
    {
        try {
   //    $request->validated($request->only(['email','name','password','confirm_password']));
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return $this->success([
                'user' => $user,
                'token' => $user->createToken('myApp')->plainTextToken,
            ], 'Register Successful');
        } catch (\Throwable $e) {
        }

        return $this->internalError($e->getMessage());
    }
}
