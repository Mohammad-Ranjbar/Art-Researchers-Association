<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'body', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
