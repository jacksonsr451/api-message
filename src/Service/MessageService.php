<?php

namespace App\Service;

class MessageService implements MessageServiceInterface
{
    private readonly MessageMethod $method;

    public function __construct(MessageMethod $method)
    {
        $this->method = $method;
    }

    public function sendEmail(string $to, string $subject, string $body)
    {
        return $this->method->get("email")->send(to: $to, subject: $subject, body: $body);
    }
}
