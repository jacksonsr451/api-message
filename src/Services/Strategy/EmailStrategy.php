<?php

namespace App\Services\Strategy;

use App\Services\MessageStrategy;

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
