<?php

namespace App\Service;

use App\Service\BadWordsServicesInterface;
use Symfony\Component\Yaml\Yaml;

class BadWordsService implements BadWordsServicesInterface
{
    private $forbiddenWords;

    public function __construct()
    {
        $this->loadForbiddenWords();
    }

    private function loadForbiddenWords(): void
    {
        $configFile = __DIR__ . '/../../config/bad_words.yaml';

        $config = Yaml::parseFile($configFile);

        $this->forbiddenWords = $config['forbidden_words'] ?? [];
    }

    public function getForbiddenWords(): array
    {
        return $this->forbiddenWords;
    }
}
