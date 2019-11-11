<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messege extends Model
{
    
    public function user(){
        return $this->belongsTo('App\User','receiver_id','id');
    }

    public function sender(){
        return $this->belongsTo('App\User','sender_id','id');
    }
}
