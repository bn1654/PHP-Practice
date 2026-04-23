<?php

namespace Controller;

use Model\Aspirant;
use Model\Scientific_director;
use Model\Publication;
use Model\Dissertation;
use Model\Status;
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
           $search = explode(' ', trim($request->get('search')));
            
            $query = Aspirant::query();

            foreach($search as $s){
           $query->where('firsname', 'LIKE', "%{$s}%")->orWhere('lastname', 'LIKE', "%{$s}%")->orWhere('patronym', 'LIKE', "%{$s}%")->orWhereHas('director', function($query) use ($s) {$query->where('lastname', 'LIKE', "%{$s}%")->orWhere('firsname', 'LIKE', "%{$s}%")->orWhere('patronym', 'LIKE', "%{$s}%");});
        }
        $aspirants = $query->get();
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

   public function detail(Request $request): string 
   {
    $aspirant = Aspirant::where('aspirantid', $request->id)->first();
    $publications = Publication::whereHas('aspirant', function($q) use($aspirant) {$q->where('authorid', $aspirant->aspirantid);})->get();
    $disertations = Dissertation::whereHas('aspirant', function($q) use($aspirant) {$q->where('authorid', $aspirant->aspirantid);})->get();
    $director = Scientific_director::where('directorid', $aspirant->director)->first();

    $authors_pub = [];
        foreach ($publications as $publication){
            $authors_pub[$publication->publicationid] = Aspirant::where('aspirantid', $publication->authorid)->first();
        }

    $statuses = [];
    $authors_dis = [];
        foreach ($disertations as $disertation){
            $statuses[$disertation->dissertationid] = Status::where('statusid', $disertation->status)->first();
            $authors_dis[$disertation->dissertationid] = Aspirant::where('aspirantid', $disertation->authorid)->first();
        }

    return new View('site.aspirant', ['director' => $director, "publications" => $publications, 'dissertations' => $disertations, 'aspirant' => $aspirant, 'authors_pub' => $authors_pub, 'authors_dis' => $authors_dis, 'statuses' => $statuses]);
   }

   
}
