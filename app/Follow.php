<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //

    protected $table = 'users-followings';
    public $timestamps = false;
}
