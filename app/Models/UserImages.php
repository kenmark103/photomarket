<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserImages extends Model
{
    //
    protected $fillable=[
      'imesages_id','src'
    ];

    public function imesage(){
      return $this->belongsTo('App\Models\Imesages','imesages_id');
    }
}
