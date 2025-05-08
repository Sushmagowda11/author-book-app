<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
      // Define the fillable attributes to protect against mass assignment
      protected $fillable = ['name', 'bio'];

      // Define the relationship: One author can have many books
      public function books()
      {
          return $this->hasMany(Book::class);
      }
}
