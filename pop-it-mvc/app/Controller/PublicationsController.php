<?php

namespace Controller;

use Model\Publication;
use Model\Aspirant;
use Src\View;
use Src\Request;


class PublicationsController
{
   public function all(Request $request): string
    {
        $publications = Publication::all();

        $authors = [];
        foreach ($publications as $publication){
            $authors[$publication->publicationid] = Aspirant::where('aspirantid', $publication->authorid)->first();
        }

        if($request->get('search')){
            $search = trim($request->get('search'));
           $publications = Publication::where('theme', 'LIKE', "%{$search}%")->orWhere('publisher', 'LIKE', "%{$search}%")->orWhereHas('aspirant', function($query) use ($search) {$query->where('lastname', 'LIKE', "%{$search}%")->orWhere('firsname', 'LIKE', "%{$search}%")->orWhere('patronym', 'LIKE', "%{$search}%");})->get();
        }

        return new View('site.publications', ['publications' => $publications, 'authors' => $authors]);
    }


   public function add(Request $request): string
   {
    if ($request->method==='POST' ){
        $request_idea = $request->all();
            $request_idea['authorid'] = explode(' -', $request_idea['authorid'])[0];

            if(Publication::create($request_idea))
           {app()->route->redirect('/publications');}
       }
    
    $authors = Aspirant::all();
    
    return new View('site.publication_form', ['authors' => $authors]);
   }

   

}
