<?php
namespace App\Helper;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function CreateToken($userEmail, $userId): string
    {
        $key = env('JWT_KEY');
        $payload = [
            "iss" => "LaravelJWT",
            "iat" => time(),
            "exp" => time() + 5 * 60 * 60,
            "userEmail" => $userEmail,
            "userId" => $userId
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
    public static function CreateAdminToken($userEmail, $userId,$userRoll): string
    {
        $key = env('JWT_KEY');
        $payload = [
            "iss" => "LaravelJWT",
            "iat" => time(),
            "exp" => time() + 5 * 60 * 60,
            "userEmail" => $userEmail,
            "userId" => $userId,
            "userRoll" => $userRoll
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function CreateTokenForSetPassword($userEmail): string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 60 * 20,
            'userEmail' => $userEmail,
            'userID' => '0'
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function VerifyToken($token):string|object
    {
        try {
            if ($token == null) {
                return 'unauthorized';
            } else {
                $key = env('JWT_KEY');
                $decode = JWT::decode($token, new Key($key, 'HS256'));
                return $decode;
            }
        } catch (Exception $e) {
            return 'unauthorized';
        }
    }


}
