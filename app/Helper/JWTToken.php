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

            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 60 * 24 * 30,
            'userEmail' => $userEmail,
            'userID' => $userId

        ];

        return JWT::encode($payload, $key, 'HS256');

    }

    public static function CreateTokenForOtp($userEmail): string
    {
        $key = env('JWT_KEY');
        $payload = [

            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 60 * 1,
            'userEmail' => $userEmail,
            'userID' => '0'

        ];

        return JWT::encode($payload, $key, 'HS256');

    }

    public static function VerifyToken($token): string | object
    {

        try {
            $key = env('JWT_KEY');
            $decode = JWT::decode($token, new Key($key, 'HS256'));
            return $decode;

        } catch (Exception $e) {
            return 'unauthorized';
        }
    }

}
