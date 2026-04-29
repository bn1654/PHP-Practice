<?php

namespace Controller;

use Model\Aspirant;
use Model\Aspirants_add;
use Model\Scientific_director;
use Model\Publication;
use Model\Dissertation;
use Model\Status;
use Src\View;
use Src\Request;
use Src\Validator\Validator;

class AspirantsController
{
   public function all(Request $request): string
    {
        $aspirants = Aspirant::all();

        if($request->get('search')){
           $search = explode(' ', trim($request->get('search')));
            
            $query = Aspirant::query();

            if($request->get('search_settings')==1){
            foreach($search as $s){
           $query->where('firsname', 'LIKE', "%{$s}%")->orWhere('lastname', 'LIKE', "%{$s}%")->orWhere('patronym', 'LIKE', "%{$s}%");
        }}
        $aspirants = $query->get();
        }

        return new View('site.aspirants', ['aspirants' => $aspirants]);
    }


   public function add(Request $request): string
   {
    if ($request->method==='POST' ){
        $validator = new Validator($request->all(), [
           'firsname' => ['required'],
           'lastname' => ['required'],
           'patronym' => ['required']
       ], [
           'required' => 'Поле пусто'
       ]);

            if($validator->fails()){
           return new View('site.aspirant_form',
               ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
       } 

            if(Aspirant::create($request->all()))
           {
            Aspirants_add::create(['user' => app()->auth::user()->userid, 'aspirant' => Aspirant::select('aspirantid')->where('firsname', $request->get('firsname'))->where('lastname', $request->get('lastname'))->where('patronym', $request->get('patronym'))->orderBy('aspirantid', 'desc')->first()->aspirantid]);
            app()->route->redirect('/aspirants');}
       }
    

    
    return new View('site.aspirant_form');
   }

   public function detail(Request $request): string 
   {
    $aspirant = Aspirant::where('aspirantid', $request->id)->first();
    $publications = Publication::whereHas('aspirant', function($q) use($aspirant) {$q->where('author', $aspirant->aspirantid);})->get();
    $disertations = Dissertation::whereHas('aspirant', function($q) use($aspirant) {$q->where('aspirant', $aspirant->aspirantid);})->get();

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

    return new View('site.aspirant', ["publications" => $publications, 'dissertations' => $disertations, 'aspirant' => $aspirant, 'authors_pub' => $authors_pub, 'coauthors_pub' => $coauthors_pub, 'authors_dis' => $authors_dis, 'coauthors_dis' => $coauthors_dis, 'statuses' => $statuses]);
   }

   
}
