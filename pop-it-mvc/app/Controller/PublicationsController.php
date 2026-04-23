<?php

namespace Controller;

use Model\Publication;
use Src\View;
use Src\Request;


class PublicationsController
{
   public function all(Request $request): string
    {
        $publications = Publication::all();
        return new View('site.publications', ['publications' => $publications]);
    }


   public function add(): string
   {
    return new View('site.publication_form');
   }

   

}
