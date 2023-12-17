<?php

namespace App\Service;

interface MessageServiceInterface
{
    public function sendEmail(
        string $to,
        string $subject,
        string $body,
    );
}
