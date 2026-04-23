<?php

namespace Controller;


use Model\Post;
use Src\View;
use Src\Request;


class SiteController
{
   public function index(Request $request): string
    {
        return new View('site.hello');
    }


   public function aspirants(): string
   {
    return new View('site.aspirants');
   }

   

}
