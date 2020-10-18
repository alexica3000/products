<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $token_valid = checkJWT($token);

        if(!$token_valid) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Please login.',
            ], 401);
        }

        return $next($request);
    }
}
