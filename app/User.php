<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];
    protected $appends = ['favorite_books'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function getFavoriteBooksAttribute()
    {
        if ($this->with('favorites.books')->get()->first()->favorites->first()->books) {

            return $this->with('favorites.books')->get()->first()->favorites->first()->books ;
        }
        else return false;
    }

}
