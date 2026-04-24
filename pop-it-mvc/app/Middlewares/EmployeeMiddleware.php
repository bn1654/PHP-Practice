<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class EmployeeMiddleware
{
   public function handle(Request $request)
   {
       if (Auth::user()->role != 2) {
           app()->route->redirect('/');
       }
   }
}
