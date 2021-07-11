<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{

    public function floor()
    {
        return $this->belongsTo('App\Floor');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

}
