<?php

namespace Controller;

use Model\User;
use Src\View;
use Src\Request;

class UserController
{
    public function signup(Request $request): string
   {
       if ($request->method==='POST' && User::create($request->all())){
           return new View('site.signup', ['message'=>'Вы успешно зарегистрированы']);
       }
       return new View('site.signup');
   }
}