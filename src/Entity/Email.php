<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Email
{
    public function __construct(
        private readonly string $to,
        private readonly string $subject,
        private readonly string $body,
        private ValidatorInterface $validator
    ) {
        $this->validateToHasEmailAddress();
        $this->validateLimitToStringInSubject();
        $this->validateTextContainBadCharacters($this->subject);
        $this->validateTextContainBadCharacters($this->body);
    }

    private function validateToHasEmailAddress(): void
    {
        $violations = $this->validator->validate($this->to, [
            new Assert\Email([
                'message' => 'O destinatário deve ser um endereço de e-mail válido.'
            ])
        ]);

        if (!empty($violations)) {
            throw new \InvalidArgumentException($violations[0]->getMessage());
        }
    }

    private function validateLimitToStringInSubject(): void
    {
        $violations = $this->validator->validate($this->subject, [
            new Assert\Length([
                'max' => 255,
                'maxMessage' => 'O assunto não pode ter mais de {{ limit }} caracteres.'
            ])
        ]);

        if (!empty($violations)) {
            throw new \InvalidArgumentException($violations[0]->getMessage());
        }
    }

    private function validateTextContainBadCharacters(string $content): void
    {
        $contentPattern = "/(palavra4|palavra5)/i";

        $violations = $this->validator->validate($content, [
            new Assert\Regex([
                'pattern' => $contentPattern,
                'match' => false,
                'message' => 'Não pode ser enviado um e-mail com conteúdo que' .
                    ' contenha as palavras "palavra4" ou "palavra5".'
            ])
        ]);

        if (!empty($violations)) {
            throw new \InvalidArgumentException($violations[0]->getMessage());
        }
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
