<?php

namespace App\Services\Strategy;

use App\Service\MessageStrategy;

class EmailStrategy implements MessageStrategy
{
    public function send(
        string $to,
        string $body,
        string $subject = null,
    ): string {
        return "Sending email: $body";
    }
}
