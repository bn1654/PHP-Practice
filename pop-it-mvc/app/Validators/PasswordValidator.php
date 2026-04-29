<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class PasswordValidator extends AbstractValidator
{
   protected string $message = 'Field :field must have only latin letters, numbers, - and _';

   public function rule(): bool
   {
       return  preg_match('/^[a-zA-Z][a-zA-Z0-9_-]{8, 16}$/', $this->value);
   }
}
