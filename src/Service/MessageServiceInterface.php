<?php

namespace App\Service;

interface MessageServiceInterface
{
    public function sendEmail(
        string $from,
        string $to,
        string $subject,
        string $body,
    );
}
