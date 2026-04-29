<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirants_add extends Model
{
   use HasFactory;
   public $timestamps = false;

   protected $fillable = [
        'user',
       'aspirant'];

}
