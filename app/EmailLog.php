<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
     public function user(){
        return $this->belongsTo('App\User','reciver_id','id');
    }

    public function sender(){
        return $this->belongsTo('App\User','sender_id','id');
    }
}
