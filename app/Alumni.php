<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    public function schedule() {
		return $this->hasMany('App\Schedule');
	}
}
