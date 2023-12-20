<?php

namespace App\Service;

interface MessageStrategy
{
    public function send(
        string $to,
        string $body,
        string $subject = null,
    ): void;
}
