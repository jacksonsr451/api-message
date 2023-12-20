<?php

namespace App\Infrastructure;

interface SendEmailInterface
{
    public function send(string $from, string $to, string $subject, string $body): void;
}
