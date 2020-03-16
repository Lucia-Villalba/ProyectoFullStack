<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class CarritoController extends Controller
{
    public function __construct(){
        if (!\Session::has('carrito')) \Session::put('carrito', array());
    }

    public function show()
    {
        $carrito = \Session::get('carrito');
        $total = $this->total();
        return view('/carrito', compact('carrito', 'total'));
    }

    public function add($id){
        $producto = Producto::find($id);
        $carrito = \Session::get('carrito'); //creo una variable de sesion

        $producto->cantidad = 1; //asigno 1 como valor por defecto
        $carrito[$producto->idProducto] = $producto;

        \Session::put('carrito', $carrito);

        return redirect()->route('carrito-ver');
    }

    public function delete($id){
        $producto = Producto::find($id);
        $carrito = \Session::get('carrito');
        unset($carrito[$producto->idProducto]);

        \Session::put('carrito', $carrito);

        return redirect()->route('carrito-ver');
    }

    public function trash(){
        \Session::forget('carrito');

        return redirect()->route('carrito-ver');
    }

    private function total(){
        $carrito = \Session::get('carrito');
        $total = 0;
        foreach($carrito as $item){
            $total += $item->precioProducto * $item->cantidad;
        }

        return $total;
    }

    public function orderDetail(){
        if(count(\Session::get('carrito')) <= 0) return redirect()->route('productos');
        $carrito = \Session::get('carrito');
        $total = $this->total();

        return view('/detallesDelPedido', compact('carrito','total'));
    }

    public function buy(){
        return \Redirect::route('index')
            ->with('message', 'La compra ha sido realizada');
    }
}
