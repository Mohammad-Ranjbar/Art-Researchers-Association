<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'image', 'biography', 'birthday', 'death'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
