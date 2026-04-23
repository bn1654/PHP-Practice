<?php

namespace Controller;


use Src\View;
use Src\Request;


class DirectorsController
{
   public function all(Request $request): string
    {
        return new View('site.scientific_directors');
    }


   public function add(): string
   {
    return new View('site.director_form');
   }

    public function detail(): string 
   {
    return new View('site.scientific_director');
   }

}
