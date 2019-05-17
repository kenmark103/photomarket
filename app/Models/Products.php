<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable = [
        'name','categories_id', 'slug', 'description','cover','status',
    ];

    public function images()
    {
     return  $this->hasMany('App\Models\ProductImage');
    }
    public function category()
    {
      return $this->belongsTo('App\Models\Categories','categories_id');
    }
}
