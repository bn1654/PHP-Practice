<?php

namespace Controller;

use Model\Aspirant;
use Model\Scientific_director;
use Src\View;
use Src\Request;


class AspirantsController
{
   public function all(Request $request): string
    {
        $aspirants = Aspirant::all();
        $aspirant_directors = [];
        foreach ($aspirants as $aspirant){
            $aspirant_directors[$aspirant->aspirantid] = Scientific_director::where('directorid', $aspirant->director)->first();
        }

        if($request->get('search')){
            $search = trim($request->get('search'));
           $aspirants = Aspirant::where('firsname', 'LIKE', "%{$search}%")->orWhere('lastname', 'LIKE', "%{$search}%")->orWhere('patronym', 'LIKE', "%{$search}%")->orWhereHas('director', function($query) use ($search) {$query->where('lastname', 'LIKE', "%{$search}%")->orWhere('firsname', 'LIKE', "%{$search}%")->orWhere('patronym', 'LIKE', "%{$search}%");})->get();
        }

        return new View('site.aspirants', ['aspirants' => $aspirants, 'directors' => $aspirant_directors]);
    }


   public function add(Request $request): string
   {
    if ($request->method==='POST' ){
        $request_idea = $request->all();
            $request_idea['director'] = explode(' -', $request_idea['director'])[0];

            if(Aspirant::create($request_idea))
           {app()->route->redirect('/aspirants');}
       }
    
    $directors = Scientific_director::all();
    
    return new View('site.aspirant_form', ['directors' => $directors]);
   }

   public function detail(): string 
   {
    return new View('site.aspirant');
   }

   
}
