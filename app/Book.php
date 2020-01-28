<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', ' publisher', 'image'];

    public function list()
    {
        return $this->belongsTo(ListBook::class);
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
