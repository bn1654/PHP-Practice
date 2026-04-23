<?php

namespace Model;

use Model\Aspirant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scientific_director extends Model
{
   use HasFactory;
   public $timestamps = false;

   public function get_aspirants_count(){
        return Aspirant::where('director', $this->directorid)->count();
   }

   protected $fillable = [
        'firsname',
       'lastname',
       'patronym'
   ];

   
   public function aspirants()
{
    return $this->hasMany(Aspirant::class, 'director', 'directorid');
}
}
