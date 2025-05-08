<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     // Define the fillable attributes to protect against mass assignment
     protected $fillable = ['title', 'author_id', 'description'];

     // Define the relationship: Each book belongs to an author
     public function author()
     {
         return $this->belongsTo(Author::class);
     }
}
