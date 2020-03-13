<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $primaryKey = "idMarca";
    public $timestamps = false;
    public $guarded = [];
}
