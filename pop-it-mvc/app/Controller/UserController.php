<?php

namespace Controller;

use Model\User;
use Src\View;
use Src\Request;
use Src\Auth\Auth;

class UserController
{
    public function signup(Request $request): string
   {
       if ($request->method==='POST' && User::create($request->all())){
           app()->route->redirect('/go');
       }
       return new View('site.signup');
   }

   public function login(Request $request): string
{
   if ($request->method === 'GET') {
       return new View('site.login');
   }
   if (Auth::attempt($request->all())) {
       app()->route->redirect('/hello');
   }
   return new View('site.login', ['message' => 'Неправильные логин или пароль']);
}

public function logout(): void
{
   Auth::logout();
   app()->route->redirect('/hello');
}
}