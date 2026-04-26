<?php

namespace Controller;

use Model\Publication;
use Src\Request;
use Src\View;

class ApiController
{
   public function index(): void
   {
       $posts = Publication::all()->toArray();

       (new View())->toJSON($posts);
   }

   public function echo(Request $request): void
   {
       (new View())->toJSON($request->all());
   }
}
