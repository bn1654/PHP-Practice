<?php

namespace Controller;


use Src\View;
use Src\Request;


class PublicationsController
{
   public function all(Request $request): string
    {
        return new View('site.publications');
    }


   public function add(): string
   {
    return new View('site.publication_form');
   }

   

}
