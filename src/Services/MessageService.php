<?php

namespace App\Services;

class MessageService implements MessageServiceInterface
{
    public function __construct(private readonly MessageMethod $method)
    {
    }

    public function sendEmail(string $to, string $subject, string $body)
    {
        return $this->method->get("email")->send(to: $to, subject: $subject, body: $body);
    }
}