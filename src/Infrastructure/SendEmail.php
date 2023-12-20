<?php

namespace App\Infrastructure;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mime\Email;

class SendEmail implements SendEmailInterface
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(string $to, string $subject, string $body): void
    {
        $message = (new Email())
            ->from($_ENV["MAILER_USER"])
            ->to($to)
            ->subject($subject)
            ->html($body);
        $this->mailer->send($message);
    }
}
