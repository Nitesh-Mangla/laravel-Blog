<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name'];

    public function post()
    {
        return $this->belongTo('post');
     }
}
