<?php

namespace App;

use App\User;
use App\Prediction;
use App\Game;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{

    public function predictions()
    {
        return $this->hasMany('App\Prediction');
    }

}
