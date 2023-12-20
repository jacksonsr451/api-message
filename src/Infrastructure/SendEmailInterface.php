<?php

namespace App\Infrastructure;

interface SendEmailInterface
{
    public function send(string $to, string $subject, string $body): void;
}
