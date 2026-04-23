<?php

namespace Controller;


use Model\Post;
use Src\View;
use Src\Request;


class SiteController
{
   public function index(Request $request): string
    {
        app()->route->redirect('/hello');
    }

   public function hello(): string
   {
       return new View('site.admin');
   }

   public function aspirants(): string
   {
    return new View('site.aspirants');
   }

   

}
