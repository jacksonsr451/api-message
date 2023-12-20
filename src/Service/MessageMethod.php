<?php

namespace App\Service;

use App\Service\Strategy\EmailStrategy;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MessageMethod
{
    private array $strategies = [
        "email" => EmailStrategy::class,
    ];

    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function get(string $method): MessageStrategy
    {
        if (!array_key_exists($method, $this->strategies)) {
            throw new \InvalidArgumentException("Método de mensagem inválido: {$method}");
        }

        $serviceId = $this->strategies[$method];

        if (!$this->container->has($serviceId)) {
            throw new \InvalidArgumentException("Classe de estratégia inválida: {$serviceId}");
        }

        return $this->container->get($serviceId);
    }
}
