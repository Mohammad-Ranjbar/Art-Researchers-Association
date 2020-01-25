<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListBook extends Model
{
    protected $table    = 'lists';
    protected $fillable = ['name', 'description'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
