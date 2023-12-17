<?php

namespace App\Services;

interface MessageServiceInterface
{
    public function sendEmail(
        string $to,
        string $subject,
        string $body,
    );
}
