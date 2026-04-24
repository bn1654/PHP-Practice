<?php

namespace Controller;

use Model\User;
use Model\Role;
use Model\Dissertation;
use Model\Aspirant;
use Model\Status;
use Src\View;
use Src\Request;


class UtilesController
{
   public function reporting(Request $request): string
    {
         $disertations = Dissertation::where('status', 3)->get();
        $statuses = [];
        $authors = [];
        $query = Dissertation::query();

        if($request->get('director')){
            $search = explode(' ', trim($request->get('director')));
            
            foreach($search as $s){
           $query->whereHas('aspirant', function($q) use($s) {$q->whereHas('director', function($que) use($s) {$que->where('lastname', 'LIKE', "%{$s}%")->orWhere('firsname', 'LIKE', "%{$s}%")->orWhere('patronym', 'LIKE', "%{$s}%");});});
            }
            $disertations = $query->where('status', 3)->get();
        }

        

        foreach ($disertations as $disertation){
            $statuses[$disertation->dissertationid] = Status::where('statusid', $disertation->status)->first();
            $authors[$disertation->dissertationid] = Aspirant::where('aspirantid', $disertation->authorid)->first();
        }



        return new View('site.reporting', ['dissertations' => $disertations, 'statuses' => $statuses, 'authors' => $authors]);
    }


   public function admin(): string
   {
    $users = User::select('userid', 'login', 'role')->get();
    $roles = [];
    foreach ($users as $user){
            $roles[$user->userid] = Role::where('roleid', $user->role)->first();
        }

    return new View('site.admin', ['users' => $users, 'roles' => $roles]);
   }
}