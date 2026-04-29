<?php

namespace Model;

use Model\Aspirant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scientific_director extends Model
{
   use HasFactory;
   public $timestamps = false;


   protected $fillable = [
        'firsname',
       'lastname',
       'patronym'
   ];

   
}
