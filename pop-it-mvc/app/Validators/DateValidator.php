<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class DateValidator extends AbstractValidator
{

   protected string $message = 'Field :field must exits';

   public function rule(): bool
   {
        $today = date('d-m-Y');
        $validate_value = strtotime($this->value);
        return $today < $validate_value;
   }
}
