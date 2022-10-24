<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateUserRequest;
use App\Http\Resources\Auth\userResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['signInWithEmailAndPassword']]);
    }

    public function signInWithEmailAndPassword(AuthenticateUserRequest $request): JsonResponse
    {

        $credentials = $request->validated();

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'invalid_credentials ! your email or phone or password is wrong'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'could_not_create_token'], 500);
        }

        return response()->json(['message' => 'User signed in successfully !', 'token' => $token, 'data' => new userResource(auth()->user())], 200);

    }

    public function signOut(): JsonResponse
    {
        $user = auth()->user();
        Auth::guard('api')->logout();

        return response()->json(['message' => 'User successfully signed out'], 200);

    }
}
