<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class bookings extends Model
{
    //
    protected $fillable = [
        'title', 'users_id', 'date','status',
    ];

    public function customer()
    {
      return $this->belongsTo('App\User','users_id');
    }
}
