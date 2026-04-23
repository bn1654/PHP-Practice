<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirant extends Model
{
   use HasFactory;
   public $timestamps = false;

   protected $fillable = [
        'firsname',
       'lastname',
       'patronym',
       'director'
   ];
}
