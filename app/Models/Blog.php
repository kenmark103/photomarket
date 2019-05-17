<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable=[
      'title','slug','description','cover','author',
    ];

    public function blogImages(){
       return $this->hasMany('App\Models\blogImages');
    }
}
