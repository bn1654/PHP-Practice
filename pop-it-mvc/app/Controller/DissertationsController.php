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
        

        return new View('site.dissertations', ['dissertations' => $disertations, 'statuses' => $statuses, 'authors' => $authors]);
    }


   public function add(): string
   {
    return new View('site.dissertation_form');
   }

   

}
