<?php

namespace Controller;

use Model\Publication;
use Model\Aspirant;
use Src\View;
use Src\Request;
use Src\Validator\Validator;

class PublicationsController
{
   public function all(Request $request): string
    {
        $publications = Publication::orderBy('publish_date', 'desc')->take(5)->get();

        $authors = [];
        $coauthors = [];
        foreach ($publications as $publication){
            $authors[$publication->publicationid] = Aspirant::where('aspirantid', $publication->author)->first();
            $coauthors[$publication->publicationid] = Scientific_director::where('directorid', $publication->coauthor)->first();
        }

        if($request->get('search')){
            $search = explode(' ', trim($request->get('search')));
            
            $query = Publication::query();

            foreach($search as $s){
           $query->where('theme', 'LIKE', "%{$s}%")->orWhere('publisher', 'LIKE', "%{$s}%")->orWhereHas('aspirant', function($query) use ($s) {$query->where('lastname', 'LIKE', "%{$s}%")->orWhere('firsname', 'LIKE', "%{$s}%")->orWhere('patronym', 'LIKE', "%{$s}%");});
            }
            $publications = $query->get();
        }

        return new View('site.publications', ['publications' => $publications, 'authors' => $authors, 'coauthors' => $coauthors]);
    }


   public function add(Request $request): string
   {
    $authors = Aspirant::all();
    if ($request->method==='POST' ){
        $validator = new Validator($request->all(), [
           'theme' => ['required'],
           'publisher' => ['required'],
           'index_RINC' => ['required'],
           'publish_date' => ['required', 'date'],
           'authorid' => ['required', 'format', 'aspirant_exists']
       ], [
           'required' => 'Поле пусто',
           'format' => 'Поле должно соответствовать формату номер - Имя Отчество Фамилия',
           'aspirant_exists' => 'Такого директора не существует',
           'date' => 'Укажите верную дату'
       ]);

            if($validator->fails()){
           return new View('site.publication_form',
               ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'authors' => $authors]);
       }    
        $request_idea = $request->all();
            $request_idea['authorid'] = explode(' -', $request_idea['authorid'])[0];

            if(Publication::create($request_idea))
           {app()->route->redirect('/publications');}
       }
    

    
    return new View('site.publication_form', ['authors' => $authors]);
   }

   

}
