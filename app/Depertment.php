<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depertment extends Model
{
    public function session(){
        return $this->belongsTo('App\Session');
    }

     public function batch(){
        return $this->belongsTo('App\Batch');
    }
}
