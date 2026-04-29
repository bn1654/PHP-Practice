<?php

namespace Controller;

use Model\Publication;
use Model\Aspirant;
use Model\Scientific_director;
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
    $coauthors = Scientific_director::all();
    if ($request->method==='POST' ){
        $validator = new Validator($request->all(), [
           'theme' => ['required'],
           'publisher' => ['required'],
           'index_RINC' => ['required'],
           'publish_date' => ['required', 'date'],
           'author' => ['required', 'format', 'aspirant_exists'],
           'coauthor' => ['required', 'format', 'director_exists']
       ], [
           'required' => 'Поле пусто',
           'format' => 'Поле должно соответствовать формату номер - Имя Отчество Фамилия',
           'aspirant_exists' => 'Такого аспиранта не существует',
           'director_exists' => 'Такого руководителя не существует',
           'date' => 'Укажите верную дату'
       ]);

            if($validator->fails()){
           return new View('site.publication_form',
               ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'authors' => $authors, 'coauthors' => $coauthors]);
       }    
        $request_idea = $request->all();
            $request_idea['author'] = explode(' -', $request_idea['author'])[0];
            $request_idea['coauthor'] = explode(' -', $request_idea['coauthor'])[0];

            if(Publication::create($request_idea))
           {app()->route->redirect('/publications');}
       }
    

    
    return new View('site.publication_form', ['authors' => $authors, 'coauthors' => $coauthors]);
   }

   

}
