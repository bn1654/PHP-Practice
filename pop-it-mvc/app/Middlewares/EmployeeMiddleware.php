<?php

namespace Middlewares;

use Auth\Auth;
use Src\Request;

class EmployeeMiddleware
{
   public function handle(Request $request)
   {
        $role = Auth::user()->role ?? 0;

       if ($role != 2) {
           app()->route->redirect('/');
       }
   }
}
