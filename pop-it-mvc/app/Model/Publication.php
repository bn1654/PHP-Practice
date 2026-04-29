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
       'author',
       'coauthor'
   ];

   protected $casts = [
        'publish_date' => 'datetime',
    ];

    public function get_directors_publications($director){
        return Publication::whereHas('aspirant', function($q) {$q->where('director', $director);})->count();
    }

   public function aspirant()
{
    return $this->belongsTo(Aspirant::class, 'authorid', 'aspirantid');
}
}
