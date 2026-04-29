<?php

namespace Model;

use Model\Scientific_director;
use Model\Dissertation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirant extends Model
{
   use HasFactory;
   public $timestamps = false;

   protected $fillable = [
        'firsname',
       'lastname',
       'patronym'
   ];

   public function director()
{
    return $this->belongsTo(Scientific_director::class, 'director', 'directorid');
}

    public function dissertations()
    {
        return $this->hasMany(Dissertation::class, 'aspirant', 'aspirantid');
    }
}
