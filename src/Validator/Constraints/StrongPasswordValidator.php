<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class StrongPasswordValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof StrongPassword) {
            throw new UnexpectedTypeException($constraint, StrongPassword::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        // Vérifiez ici les conditions de complexité du mot de passe
        // Par exemple, vous pouvez utiliser des expressions régulières pour vérifier les caractères spéciaux, les majuscules, les minuscules, les chiffres, etc.

        // Si le mot de passe ne respecte pas les critères, ajoutez une violation à la contrainte
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/', $value)) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
