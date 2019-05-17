<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    protected $fillable = [
        'title', 'location', 'date','time','cover','status',
    ];

    public function eventBkings(){
      return $this->hasMany('App\Models\event_bookings','events_id');
    }
}
