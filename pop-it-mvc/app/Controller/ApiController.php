<?php

namespace Controller;

use Model\Publication;
use Model\Dissertation;
use Model\Aspirant;
use Model\Status;
use Src\Request;
use Src\View;
use Auth\Auth;

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

   public function auth(Request $request): void 
   {
    $token = '';

    if ($request->get('login') || $request->get('password')){

    if (Auth::attempt($request->all())) {
        $user = Auth::user();
        $token = Auth::generateApiToken($user);
        (new View())->toJSON(['token' => $token]);
   }else{
    (new View()->toJSON(['ERROR' => 'Неверный логин или пароль']));
    exit();
   }}
   else {
        (new View())->toJSON(['ERROR' => 'Не предоставлено нужных данных']);
   }
   }

   public function reports(Request $request): void 
   {
        $disertations = Dissertation::where('status', 3)->get();


        (new View()->toJSON($disertations->toArray()));
   }
}
