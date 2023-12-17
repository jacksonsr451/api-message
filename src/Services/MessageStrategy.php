<?php

namespace App\Services;

interface MessageStrategy
{
    public function send(
        string $to,
        string $body,
        string $subject = null,
    ): string;
}
