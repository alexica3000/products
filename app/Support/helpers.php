<?php

use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * JWT functions added here because of Middleware try/catch limitations
 * @param $token
 * @return bool
 */
function checkJWT($token) {
    try {
        JWTAuth::setToken($token);
        $apy = JWTAuth::getPayload()->toArray();
    } catch (Exception $e) {
        return false;
    }

    return true;
}

function getJwtClaims($token)
{
    try {
        JWTAuth::setToken($token);
        $decoded = JWTAuth::getPayload()->toArray();
    } catch (Exception $e) {
        return null;
    }

    return $decoded;
}

function getJwtClaimItem($key)
{
    $token = request()->bearerToken();
    $claims = getJwtClaims($token);
    return empty($claims[$key]) ? null : $claims[$key];
}
