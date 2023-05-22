<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class StrongPassword extends Constraint
{
    public $message = 'Le mot de passe doit contenir au moins 8 caractères et inclure au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.';
}
