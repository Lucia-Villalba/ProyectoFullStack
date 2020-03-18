<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    $mk_id = App\Marca::pluck('idMarca');
    $cat_id = App\Categoria::pluck('idCategoria');

    return [
        'nbProducto'=>$faker->word,
        'precioProducto'=>$faker->numberBetween($min=1000,$max=10000),
        'dtlProducto'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'imgProducto'=>$faker->image('public/img/productos',640,480, null, false),
        'CATEGORIAS_idCategoria'=>$cat_id->random(),
        'MARCAS_idMarca'=>$mk_id->random(),
    ];
});
