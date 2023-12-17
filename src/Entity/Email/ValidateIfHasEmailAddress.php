<?php


namespace App\Entity\Email;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ValidateIfHasEmailAddress extends ConstraintValidator
{
    public function validate($email, Constraint $constraint)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}
