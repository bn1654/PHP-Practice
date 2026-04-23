<?php

namespace Controller;


use Src\View;
use Src\Request;


class DissertationsController
{
   public function all(Request $request): string
    {
        return new View('site.dissertations');
    }


   public function add(): string
   {
    return new View('site.dissertation_form');
   }

   

}
