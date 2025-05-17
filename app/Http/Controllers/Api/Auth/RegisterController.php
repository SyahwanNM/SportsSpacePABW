<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::create($request->all());

        $token = $user->createToken('auth_token')->plainTextToken;

        return(new UserResource($user))->additional([
            'token' => $token,
        ]);
    }
}
