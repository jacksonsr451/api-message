<?php

namespace App\Entity\Email;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ValidateLimitToStringInSubject extends ConstraintValidator
{
    public function validate($subject, Constraint $constraint)
    {
        if (strlen($subject) > $constraint->max) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}
