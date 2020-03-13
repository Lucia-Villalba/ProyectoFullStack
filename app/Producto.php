<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $primaryKey = "idProducto";
    public $timestamps = false;
    public $guarded = [];

    public function getMarca()
    {
        return $this->belongsTo('App\Marca', 'MARCAS_idMarca');
    }
    public function getCategoria()
    {
        return $this->belongsTo('App\Categoria', 'CATEGORIAS_idCategoria');
    }
}
