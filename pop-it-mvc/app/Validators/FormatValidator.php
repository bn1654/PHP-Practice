<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class FormatValidator extends AbstractValidator
{
   protected string $message = 'Field :field must be in format number - name';

   public function rule(): bool
   {
       return  preg_match('/^\d+ - [А-ЯЁ][а-яё]+(?:-[А-ЯЁ][а-яё]+)?\s+[А-ЯЁ][а-яё]+(?:\s+[А-ЯЁ][а-яё]+)?$/u', $this->value);
   }
}
