<?php

namespace App;

use App\User;
use App\Prediction;
use App\Game;
use Illuminate\Database\Eloquent\Model;


class Prediction extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function game()
    {
    	return $this->belongsTo('App\Game');
    }

}
