<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name','publisher','description','author', 'image','user_id','list_id'];

    public function list()
    {
        return $this->belongsTo(ListBook::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
