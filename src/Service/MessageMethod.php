<?php

namespace App\Service;

use App\Services\Strategy\EmailStrategy;

class MessageMethod
{
    private static array $strategies = [
        "email" => EmailStrategy::class,
    ];

    public static function get(string $method): MessageStrategy
    {
        if (!array_key_exists($method, self::$strategies)) {
            throw new \InvalidArgumentException("Método de mensagem inválido: {$method}");
        }

        $strategyClass = self::$strategies[$method];
        return new $strategyClass();
    }
}
