<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    // public static function boot()
    // {
    //     parent::boot();
    //     self::deleting(function ($forum) {
    //         $forum->comments()->delete();
    //     });
    // }
}
