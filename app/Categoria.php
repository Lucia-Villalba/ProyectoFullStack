<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $primaryKey = "idCategoria";
    public $timestamps = false;
    public $guarded = [];
}
