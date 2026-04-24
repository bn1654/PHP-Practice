<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class AdminMiddleware
{
   public function handle(Request $request)
   {
       if (Auth::user()->role != 1) {
           app()->route->redirect('/');
       }
   }
}
