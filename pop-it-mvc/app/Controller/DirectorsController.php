<?php

namespace Controller;

use Model\Scientific_director;
use Src\View;
use Src\Request;


class DirectorsController
{
   public function all(Request $request): string
    {   
        $directors = Scientific_director::all();

        if($request->get('search')){
            $search = explode(trim($request->get('search')), ' ');
            foreach($search as $s){
           $directors = Scientific_director::where('lastname', 'LIKE', "%{$s}%")->orWhere('firsname', 'LIKE', "%{$s}%")->orWhere('patronym', 'LIKE', "%{$s}%")->get();
            }}

        return new View('site.scientific_directors', ['directors' => $directors]);
    }


   public function add(Request $request): string
   {
        if ($request->method==='POST' && Scientific_director::create($request->all())){
           app()->route->redirect('/directors');
       }
        return new View('site.director_form');
   }

    public function detail(): string 
   {
    return new View('site.scientific_director');
   }

}
