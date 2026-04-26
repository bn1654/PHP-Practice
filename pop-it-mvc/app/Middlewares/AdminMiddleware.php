<?php

namespace Middlewares;

use Auth\Auth;
use Src\Request;

class AdminMiddleware
{
   public function handle(Request $request)
   {    
        $role = Auth::user()->role ?? 0;

       if ($role != 1) {
           app()->route->redirect('/');
       }
   }
}
