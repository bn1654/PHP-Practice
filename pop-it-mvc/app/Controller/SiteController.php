<?php

namespace Controller;

use Model\Publication;
use Model\Aspirant;
use Model\Scientific_director;
use Src\View;
use Src\Request;


class SiteController
{
   public function index(Request $request): string
    {
        $publications = Publication::orderBy('publish_date', 'desc')->take(5)->get();

        $authors = [];
        foreach ($publications as $publication){
            $authors[$publication->publicationid] = Aspirant::where('aspirantid', $publication->authorid)->first();
        }

        $directors = Scientific_director::withCount('aspirants')->orderBy('aspirants_count', 'desc')->take(5)->get();
        return new View('site.hello', ['publications' => $publications, 'directors' => $directors, 'authors' => $authors]);
    }


   

}
