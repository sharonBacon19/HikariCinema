<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    //un rol pertene a varios usuarios
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
