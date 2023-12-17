<?php

namespace App\Service;

interface BadWordsServicesInterface
{
    public function getForbiddenWords(): array;
}
