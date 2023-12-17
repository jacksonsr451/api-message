<?php

namespace App\Entity\Email;

use InvalidArgumentException;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Validation;

class ValidateTextContainBadCharacters
{
    public static function validate(string $content, array $forbiddenWords = []): void
    {
        if (!empty($forbiddenWords)) {
            $contentPattern = "/(" . implode('|', array_map('preg_quote', $forbiddenWords)) . ")/i";

            $violations = Validation::createValidator()->validate($content, [
                new Regex([
                    'pattern' => $contentPattern,
                    'match' => false,
                    'message' => 'Não pode ser enviado um e-mail com conteúdo que contenha as palavras impróprias.'
                ])
            ]);

            if ($violations->count() > 0) {
                throw new InvalidArgumentException($violations->get(0)->getMessage());
            }
        }
    }
}
