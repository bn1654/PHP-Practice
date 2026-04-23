<?php

namespace Controller;

use Model\Dissertation;
use Model\Aspirant;
use Model\Status;
use Src\View;
use Src\Request;


class DissertationsController
{
   public function all(Request $request): string
    {
        $disertations = Dissertation::all();
        $statuses = [];
        $authors = [];
        foreach ($disertations as $disertation){
            $statuses[$disertation->dissertationid] = Status::where('statusid', $disertation->status)->first();
            $authors[$disertation->dissertationid] = Aspirant::where('aspirantid', $disertation->authorid)->first();
        }
        
        if($request->get('search')){
            $search = explode(' ', trim($request->get('search')));
            
            $query = Dissertation::query();

            foreach($search as $s){
           $query->where('theme', 'LIKE', "%{$s}%")->orWhere('vak', 'LIKE', "%{$s}%")->orWhereHas('aspirant', function($query) use ($s) {$query->where('lastname', 'LIKE', "%{$s}%")->orWhere('firsname', 'LIKE', "%{$s}%")->orWhere('patronym', 'LIKE', "%{$s}%");});
            }
            $disertations = $query->get();
        }

        return new View('site.dissertations', ['dissertations' => $disertations, 'statuses' => $statuses, 'authors' => $authors]);
    }


   public function add(Request $request): string
   {
    if ($request->method==='POST' ){
        $request_idea = $request->all();
            $request_idea['authorid'] = explode(' -', $request_idea['authorid'])[0];

            if(Dissertation::create($request_idea))
           {app()->route->redirect('/dissertations');}
       }
    
    $authors = Aspirant::all();
    $statuses = Status::all();

    return new View('site.dissertation_form', ['authors' => $authors, 'statuses' => $statuses]);
   }

   

}
