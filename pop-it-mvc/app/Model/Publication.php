<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
   use HasFactory;
   public $timestamps = false;

   protected $fillable = [
       'theme',
       'publisher',
       'publish_date',
       'index_RINC',
       'authorid'
   ];

   public function aspirant()
{
    return $this->belongsTo(Aspirant::class, 'authorid', 'aspirantid');
}
}
