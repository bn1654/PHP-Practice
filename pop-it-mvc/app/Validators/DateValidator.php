<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;
use DateTime;

class DateValidator extends AbstractValidator
{

   protected string $message = 'Field :field must exits';

   public function rule(): bool
   {
         $today = new DateTime('today');
         $inputDate = DateTime::createFromFormat('d-m-Y', $this->value);



         return $inputDate <= $today;
   }
}
