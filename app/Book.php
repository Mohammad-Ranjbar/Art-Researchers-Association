<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name','publisher','description','author', 'image','user_id','list_id'];
    protected $appends = ['favorite_book'];

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
  public function favorite()
  {
      return $this->belongsTo(Favorite::class);
  }

  public function favoritebooks()
  {
      return $this->hasManyThrough(Book::class, Favorite::class);
  }

  public function getFavoriteBookAttribute()
  {
      if (auth()->user()->favorites->where('book_id',$this->id)->first()) {

      return true ;
      }
      else return false;
  }
}
