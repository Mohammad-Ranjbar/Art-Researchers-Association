<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['book_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
