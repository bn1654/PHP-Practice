<?php

namespace Middlewares;

use Src\Request;
use Auth\Auth;

class BearerAuthMiddleware
{
    public function handle(Request $request)
    {
        $headers = getallheaders();
        $authHeader = $headers['Authorization'] ?? $headers['authorization'] ?? '';
        if (!preg_match('/^Bearer\s+(\S+)$/', $authHeader, $matches)) {
            http_response_code(401);
            echo json_encode(['error' => 'Токен не предоставлен или имеет неверный формат']);
            exit;
        }

        $token = $matches[1];

        $user = Auth::userFromToken($token);
        if (!$user) {
            http_response_code(401);
            echo json_encode(['error' => 'Недействительный токен']);
            exit;
        }


        Auth::login($user);

        return true;
    }
}