<?php

namespace Controller;

use Model\Aspirant;
use Model\Publication;
use Model\Dissertation;
use Model\Status;
use Model\Scientific_director;
use Src\View;
use Src\Request;
use Src\Validator\Validator;


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
        if ($request->method==='POST'){
            $validator = new Validator($request->all(), [
           'firsname' => ['required'],
           'lastname' => ['required'],
           'patronym' => ['required']
       ], [
           'required' => 'Поле :field пусто',
           'unique' => 'Поле :field должно быть уникально'
       ]);

        if($validator->fails()){
           return new View('site.director_form',
               ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
       }


         if(Scientific_director::create($request->all()))
           {app()->route->redirect('/directors');}
       }
        return new View('site.director_form');
   }

    public function detail(Request $request): string 
   {

    $director = Scientific_director::where('directorid', $request->id)->first();
    $publications = Publication::where('coauthor', $request->id)->get();
    $disertations = Dissertation::where('director', $request->id)->get();
    $aspirants = Aspirant::whereHas('dirssertations', function($q) use($director) {$q->where('director', $director->directorid);})->get();

    $authors_pub = [];
    $coauthors_pub = [];
        foreach ($publications as $publication){
            $authors_pub[$publication->publicationid] = Aspirant::where('aspirantid', $publication->author)->first();
            $coauthors_pub[$publication->publicationid] = Scientific_director::where('directorid', $publication->coauthor)->first();
        }

    $statuses = [];
    $authors_dis = [];
    $coauthors_dis = [];
        foreach ($disertations as $disertation){
            $statuses[$disertation->dissertationid] = Status::where('statusid', $disertation->status)->first();
            $authors_dis[$disertation->dissertationid] = Aspirant::where('aspirantid', $disertation->aspirant)->first();
            $coauthors_dis[$publication->publicationid] = Scientific_director::where('directorid', $disertation->director)->first();
        }

    return new View('site.scientific_director', ['director' => $director, "publications" => $publications, 'dissertations' => $disertations, 'aspirants' => $aspirants, 'authors_pub' => $authors_pub, 'coauthors_pub' => $coauthors_pub, 'authors_dis' => $authors_dis, 'coauthors_dis' => $coauthors_dis, 'statuses' => $statuses]);
   }

}
