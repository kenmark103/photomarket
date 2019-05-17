<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class event_bookings extends Model
{
    //eventname
    protected $fillable=[
      'events_id','event_title','users_id',
    ];

    public function user(){
      return $this->belongsTo('App\User','users_id');
    }
    public function event(){
      return $this->belongsTo('App\Models\Events','events_id');
    }
}
