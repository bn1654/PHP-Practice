<?php

namespace Middlewares;

use Src\Request;
use Auth\Auth;

class BearerAuthMiddleware
{
    public function handle(Request $request, $next = null)
    {
        $uri = $_SERVER['REQUEST_URI'];

        // Пропускаем все не-API запросы
        if (strpos($uri, '/api/') !== 0 && strpos($uri, '/api') !== 0) {
            return $request;
        }

        // Публичный маршрут выдачи токена – не требует проверки
        if (strpos($uri, '/api/auth') !== false or strpos($uri, '/api/') !== false) {
            return $request;
        }

        // Все остальные /api/* требуют Bearer Token
        $authHeader = $request->headers['Authorization'] ?? $request->headers['authorization'] ?? '';

        if (empty($authHeader)) {
            http_response_code(401);
            echo json_encode(['error' => 'Токен не предоставлен']);
            exit;
        }

        if (!preg_match('/^Bearer\s+(\S+)$/', $authHeader, $matches)) {
            http_response_code(401);
            echo json_encode(['error' => 'Неверный формат токена (ожидается Bearer)']);
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
        return $request;
    }
}