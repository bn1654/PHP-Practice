<?php

namespace Controller;


use Src\View;
use Src\Request;


class UtilesController
{
   public function reporting(Request $request): string
    {
        return new View('site.reporting');
    }


   public function admin(): string
   {
    return new View('site.admin');
   }


   
}
