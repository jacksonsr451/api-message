<?php

namespace App\Entity\Email;

use Symfony\Component\Validator\Constraints\Email as EmailValidator;
use Symfony\Component\Validator\Constraints\Length;
use App\Service\BadWordsServicesInterface;

class Email
{
    public function __construct(
        private readonly string $to,
        private readonly string $subject,
        private readonly string $body,
        private BadWordsServicesInterface $forbiddenWords
    ) {
        (new ValidateIfHasEmailAddress())->validate(email: $to, constraint: new EmailValidator());
        (new ValidateLimitToStringInSubject())->validate(subject: $subject, constraint: new Length(['max' => 255]));
        ValidateTextContainBadCharacters::validate(
            content: $this->subject,
            forbiddenWords: $forbiddenWords->getForbiddenWords()
        );

        ValidateTextContainBadCharacters::validate(
            content: $this->body,
            forbiddenWords: $forbiddenWords->getForbiddenWords()
        );
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
