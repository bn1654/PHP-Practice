<?php

namespace Controller;

use Model\Aspirant;
use Model\Publication;
use Model\Dissertation;
use Model\Status;
use Model\Scientific_director;
use Src\View;
use Src\Request;


class DirectorsController
{
   public function all(Request $request): string
    {   
        $directors = Scientific_director::all();

        if($request->get('search')){
            $search = explode(' ', trim($request->get('search')));
            
            $query = Scientific_director::query();

            foreach($search as $s){
           $query->where('lastname', 'LIKE', "%{$s}%")->where('firsname', 'LIKE', "%{$s}%")->where('patronym', 'LIKE', "%{$s}%");
            }
            $directors = $query->get();
            }

        return new View('site.scientific_directors', ['directors' => $directors]);
    }


   public function add(Request $request): string
   {
        if ($request->method==='POST' && Scientific_director::create($request->all())){
           app()->route->redirect('/directors');
       }
        return new View('site.director_form');
   }

    public function detail(Request $request): string 
   {

    $director = Scientific_director::where('directorid', $request->id)->first();
    $publications = Publication::whereHas('aspirant', function($q) use($director) {$q->where('director', $director->directorid);})->get();
    $disertations = Dissertation::whereHas('aspirant', function($q) use($director) {$q->where('director', $director->directorid);})->get();
    $aspirants = Aspirant::where('director', $director->directorid)->get();

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

    return new View('site.scientific_director', ['director' => $director, "publications" => $publications, 'dissertations' => $disertations, 'aspirants' => $aspirants, 'authors_pub' => $authors_pub, 'authors_dis' => $authors_dis, 'statuses' => $statuses]);
   }

}
