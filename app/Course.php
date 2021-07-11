<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function class()
    {
        return $this->belongsTo('App\Classe');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function reservation()
    {
        return $this->hasOne('App\Reservation');
    }
}
