<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    public function session(){
        return $this->belongsTo('App\Session');
    }

     public function batch(){
        return $this->belongsTo('App\Batch');
    }

     public function alumni(){
        return $this->hasMany('App\Alumni','id','alumni_id');
    }


    public function user(){
        return $this->belongsTo('App\User');
    }
}
