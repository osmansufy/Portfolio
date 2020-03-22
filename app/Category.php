<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
public  function portfolio(){
    return $this->hasMany(Portfolio::class);
}
public  function post(){
    return $this->hasMany(Blog::class);
}
}
