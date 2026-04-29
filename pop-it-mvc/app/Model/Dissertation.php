<?php

namespace Model;

use Model\Aspirant;
use Model\Scientific_director;
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
       'aspirant',
       'director'
   ];

   public function aspirant()
{
    return $this->belongsTo(Aspirant::class, 'aspirant', 'aspirantid');
}
public function director()
{
    return $this->belongsTo(Scientific_director::class, 'director', 'directorid');
}
}
