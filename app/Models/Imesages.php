<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imesages extends Model
{
    //
    protected $fillable = [
        'users_id', 'admins_id', 'slug','message',
      ];
      public function user()
      {
        return $this->belongsTo('App\User','users_id');
      }
      public function admin()
      {
        return $this->belongsTo('App\Models\Admins','admins_id');
      }
      public function uploads()
      {
        return $this->hasMany('App\Models\UserImages');
      }
}
