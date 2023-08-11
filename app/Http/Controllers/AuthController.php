<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    

    public function login(Request $request)
{
    $credentials = $request->only(['email', 'password']);

    try {
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }
    } catch (JWTException $e) {
        return response()->json(['message' => 'Could not create token'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    return response()->json([
        'token' => $token,
        'user' => Auth::user()
    ]);
}

}
