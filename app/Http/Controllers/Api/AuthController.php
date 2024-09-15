<?php

namespace App\Http\Controllers\Api;

use ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserReq;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{




    public function register(StoreUserReq $request)
    {
        $validatiedData = $request->validated();

        $user = User::create($validatiedData);

        $data['token'] = $user->createToken('Vacation Rental')->plainTextToken;
        $data['name'] = $user->name;
        $data['email'] = $user->email;

        return ApiResponse::sendResponse(200, 'User Registered Successfullly', $data);
    }

    public function login(LoginRequest $request)
    {
        $validatiedData = $request->validated();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $data['token'] = $user->createToken('Vacation Rental')->plainTextToken;
            $data['name'] = $user->name;
            $data['email'] = $user->email;

            return ApiResponse::sendResponse(200, 'User Logged in Successfullly', $data);
        } else {
            return ApiResponse::sendResponse(401, 'User Credentials doen\'t exist', []);
        }
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return ApiResponse::sendResponse(200, 'Logged OUt Successfully', []);
    }
}
