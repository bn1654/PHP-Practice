<?php

namespace Controller;

use Model\User;
use Model\Role;
use Src\View;
use Src\Request;
use Src\Auth\Auth;

class UserController
{
    public function signup(Request $request): string
   {
        $roles = Role::all();
       if ($request->method==='POST'){
        if($request->password === $request->password2 && User::create($request->all()))
           app()->route->redirect('/admin');
        else
            return new View('site.signup',['message' => 'Пароли должны совпадать', 'roles' => $roles]);
       }
       return new View('site.signup', ['roles' => $roles]);
   }

   public function login(Request $request): string
{
   if ($request->method === 'GET') {
       return new View('site.login');
   }
   if (Auth::attempt($request->all())) {
       app()->route->redirect('/');
   }
   return new View('site.login', ['message' => 'Неправильные логин или пароль']);
}

public function logout(): void
{
   Auth::logout();
   app()->route->redirect('/');
}
}