<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    public $fillable = ['content','topic'];

    public $timestamps = false;
}
