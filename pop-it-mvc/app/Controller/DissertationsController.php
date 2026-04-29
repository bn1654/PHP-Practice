<?php

namespace Controller;

use Model\Dissertation;
use Model\Aspirant;
use Model\Status;
use Model\Scientific_director;
use Src\View;
use Src\Request;
use Src\Validator\Validator;

class DissertationsController
{
   public function all(Request $request): string
    {
        $disertations = Dissertation::all();
        $statuses = [];
        $authors = [];
        $coauthors = [];
        foreach ($disertations as $disertation){
            $statuses[$disertation->dissertationid] = Status::where('statusid', $disertation->status)->first();
            $authors[$disertation->dissertationid] = Aspirant::where('aspirantid', $disertation->authorid)->first();
            $coauthors[$publication->publicationid] = Scientific_director::where('directorid', $disertation->director)->first();
        }
        
        if($request->get('search')){
            $search = explode(' ', trim($request->get('search')));
            
            $query = Dissertation::query();

            foreach($search as $s){
           $query->where('theme', 'LIKE', "%{$s}%")->orWhere('vak', 'LIKE', "%{$s}%")->orWhereHas('aspirant', function($query) use ($s) {$query->where('lastname', 'LIKE', "%{$s}%")->orWhere('firsname', 'LIKE', "%{$s}%")->orWhere('patronym', 'LIKE', "%{$s}%");});
            }
            $disertations = $query->get();
        }

        return new View('site.dissertations', ['dissertations' => $disertations, 'statuses' => $statuses, 'authors' => $authors, 'coauthors' => $coauthors]);
    }


   public function add(Request $request): string
   {
        $authors = Aspirant::all();
        $statuses = Status::all();
    if ($request->method==='POST' ){
        $validator = new Validator($request->all(), [
           'theme' => ['required'],
           'status' => ['required'],
           'vak' => ['required'],
           'date' => ['required', 'date'],
           'authorid' => ['required', 'format', 'aspirant_exists']
       ], [
           'required' => 'Поле :field пусто',
           'format' => 'Поле :field должно соответствовать формату номер - Имя Отчество Фамилия',
           'aspirant_exists' => ':field такого директора не существует',
           'date' => ':field укажите верную дату'
       ]);

            if($validator->fails()){
           return new View('site.dissertation_form',
               ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'authors' => $authors, 'statuses' => $statuses]);
       }    
        $request_idea = $request->all();
            $request_idea['authorid'] = explode(' -', $request_idea['authorid'])[0];

            if(Dissertation::create($request_idea))
           {app()->route->redirect('/dissertations');}
       }
    


    return new View('site.dissertation_form', ['authors' => $authors, 'statuses' => $statuses]);
   }

   

}
