<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'coords';
}
