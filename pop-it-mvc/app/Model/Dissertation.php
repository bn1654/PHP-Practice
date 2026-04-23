<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dissertation extends Model
{
   use HasFactory;
   public $timestamps = false;

   protected $fillable = [
       'theme',
       'status',
       'date',
       'vak',
       'authorid'
   ];
}
