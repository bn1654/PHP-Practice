<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class AspirantExistsValidator extends AbstractValidator
{

   protected string $message = 'Field :field must exits';

   public function rule(): bool
   { 
    if (empty($this->value) || !is_string($this->value)) {
        return false;
    }
        $value = $this->value ?? ' ';
       
       $value = explode(' - ', $value);
       $value[1] = explode(' ', $value[1]);
       return (bool)Capsule::table('aspirants')
           ->where('aspirantid', $value[0])->where('firsname', $value[1][0] ?? ' ')->where('patronym', $value[1][1] ?? ' ')->where('lastname', $value[1][2] ?? ' ')->count();
   }
}
