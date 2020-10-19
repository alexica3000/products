<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class AuthController extends Controller
{
    private $refreshJwtCookieName = 'refresh-jwt-cookie';

    public function login(AuthLoginRequest $request)
    {
        $user = User::getUser($request->validated());

        if(empty($user)) return response()->json(['message' => 'User not found'], 422);

        $payload = JWTFactory::customClaims([
            'sub'        => 'sub',
            'exp'        => time() + 60 * config('jwt.ttl'),
            'user_type'  => $user->user_type,
            'user_id'    => $user->id,
            'user_name'  => $user->name,
            'user_email' => $user->email
        ])->make();

        $token = JWTAuth::encode($payload);

        return response()->json(['token' => (string)$token], 200);
    }

    /**
    Invalidates JWT token
     **/
    public function logout()
    {
        try {
            $token = request()->bearerToken();

            JWTAuth::setToken($token)->invalidate(true);

            return response()->json(['message' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
    Refreshes JWT token
     **/
    public function refresh()
    {
        try {
            $token = request()->bearerToken();

            if ($token) {
                $newToken = JWTAuth::setToken($token)->refresh(false, false);

                return response()->json(['token' => (string)$newToken]);
            } else {
                throw new \Exception("Token doesn't exist");
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
