<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    
    public function classes()
    {
        return $this->hasMany('App\Classe');
    }

}
