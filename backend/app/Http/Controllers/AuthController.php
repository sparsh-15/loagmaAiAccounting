<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        // TODO: Implement login logic
        return response()->json(['message' => 'Login endpoint']);
    }

    public function logout(Request $request): JsonResponse
    {
        // TODO: Implement logout logic
        return response()->json(['message' => 'Logout endpoint']);
    }

    public function refresh(Request $request): JsonResponse
    {
        // TODO: Implement token refresh
        return response()->json(['message' => 'Refresh endpoint']);
    }

    public function me(Request $request): JsonResponse
    {
        // TODO: Return authenticated user
        return response()->json(['message' => 'Me endpoint']);
    }
}
