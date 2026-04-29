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
        $coauthors = [];
        foreach ($publications as $publication){
            $authors[$publication->publicationid] = Aspirant::where('aspirantid', $publication->author)->first();
            $coauthors[$publication->publicationid] = Scientific_director::where('directorid', $publication->coauthor)->first();
        }

        $directors = Scientific_director::orderBy('lastname', 'desc')->orderBy('firsname', 'desc')->orderBy('patronym', 'desc')->take(5)->get();
        return new View('site.hello', ['publications' => $publications, 'directors' => $directors, 'authors' => $authors, 'coauthors' => $coauthors]);
    }


   

}
