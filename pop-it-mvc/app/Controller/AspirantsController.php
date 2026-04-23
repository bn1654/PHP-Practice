<?php

namespace Controller;


use Src\View;
use Src\Request;


class AspirantsController
{
   public function all(Request $request): string
    {
        return new View('site.aspirants');
    }


   public function add(): string
   {
    return new View('site.aspirant_form');
   }

   public function detail(): string 
   {
    return new View('site.aspirant');
   }

   
}
