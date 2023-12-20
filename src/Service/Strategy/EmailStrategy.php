<?php

namespace App\Service\Strategy;

use App\Infrastructure\SendEmailInterface;
use App\Service\MessageStrategy;

class EmailStrategy implements MessageStrategy
{
    private SendEmailInterface $email;

    public function __construct(SendEmailInterface $email)
    {
        $this->email = $email;
    }

    public function send(
        string $from,
        string $to,
        string $body,
        string $subject = null,
    ): void {
        $this->email->send(from: $from, to: $to, subject: $subject, body: $body);
    }
}
