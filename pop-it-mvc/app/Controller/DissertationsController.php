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
            $search = trim($request->get('search'));
           $disertations = Dissertation::where('theme', 'LIKE', "%{$search}%")->orWhere('vak', 'LIKE', "%{$search}%")->orWhereHas('aspirant', function($query) use ($search) {$query->where('lastname', 'LIKE', "%{$search}%")->orWhere('firsname', 'LIKE', "%{$search}%")->orWhere('patronym', 'LIKE', "%{$search}%");})->get();
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
