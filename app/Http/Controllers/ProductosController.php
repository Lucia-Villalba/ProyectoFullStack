<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Marca;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware('admin',['only'=>['create','store','edit','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('idProducto','asc')->paginate(8);
        $vac = compact("productos");
        return view ('adminProductos', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('formAgregarProductos',
            [
                'marcas'=>$marcas,
                'categorias'=>$categorias
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            "nbProducto" => "string|min:5|max:90|required",          
            "precioProducto" => "integer|required",
            "dtlProducto" => "string|min:4|max:135",
            "CATEGORIAS_idCategoria" => "required",
            "MARCAS_idMarca" => "required",
            "imgProducto" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ];
        $mensajes = [
            "string" => "El campo :attribute debe ser un texto",
            "max" => "El campo :attribute debe tener un máximo de :max",
            "min" => "El campo :attribute debe tener un mínimo de :min",
            "required" => "El campo :attribute debe ser completado",
            "integer " => "El campo :attribute debe ser un número entero",
            "imgProducto" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ];
        $this->validate($request, $reglas, $mensajes);

        $productoNuevo = new Producto();

        $nombreArchivo = "noDisponible.png";
        if ( $request->file("imgProducto") ) {
            $archivo = $request->file("imgProducto");
            $nombreArchivo = time().$archivo->getClientOriginalName();
            $request->imgProducto->move(public_path('img/productos'), $nombreArchivo);
        }
      

        $productoNuevo->nbProducto = $request["nbProducto"];
        $productoNuevo->precioProducto = $request["precioProducto"];
        $productoNuevo->dtlProducto = $request["dtlProducto"];
        $productoNuevo->CATEGORIAS_idCategoria = $request["CATEGORIAS_idCategoria"];
        $productoNuevo->MARCAS_idMarca = $request["MARCAS_idMarca"];
        $productoNuevo->imgProducto = $nombreArchivo;

        $productoNuevo->save();

        return back()->with("estado", "El producto se agregó con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productoSeleccionado = Producto::find($id);
        return view ("detalleProducto", ['producto'=>$productoSeleccionado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view("formModificarProductos",
        [
            'producto'=>$producto,
            'marcas'=>$marcas,
            'categorias'=>$categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reglas = [
            "nbProducto" => "string|min:5|max:90|required",
            "precioProducto" => "filled|required",
            "dtlProducto" => "string|min:4|max:135",
            "CATEGORIAS_idCategoria" => "required",
            "MARCAS_idMarca" => "required",
            "imgProducto" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ];
        $mensajes = [
            "string" => "El campo debe ser un texto",
            "max" => "El campo debe tener un máximo de :max",
            "min" => "El campo debe tener un mínimo de :min",
            "required" => "El campo debe ser completado",
            "integer " => "El campo debe ser un número entero",
            "filled" => "El campo no debe estar vacio"
        ];
        $this->validate($request, $reglas, $mensajes);





        /**creo una variable que recibe los datos del formulario */
        $productoModificado = $request->except(['_token','_method']);


        /**IMAGEN CARGADA - busco el producto y elimino su imagen del directorio para luego la reemplazo */
        $producto = Producto::find($id);

        if ($request->file("imgProducto")){
            Storage::delete('public/img/productos'.$producto->imgProducto);
            $nombreArchivo = time().$request->file("imgProducto")->getClientOriginalName();
            $ruta = basename($request->file("imgProducto")->move(public_path('img/productos'), $nombreArchivo));
            $producto->imgProducto = $ruta;

        }
        //En base a el $request, asignar a $producto los nuevos valores
        //Ejemplo : $producto->nbProducto = $request['nbProducto'];
        //TO DO
        $producto->nbProducto = $request['nbProducto'];
        $producto->precioProducto = $request['precioProducto'];
        $producto->dtlProducto = $request['dtlProducto'];
        $producto->CATEGORIAS_idCategoria = $request["CATEGORIAS_idCategoria"];
        $producto->MARCAS_idMarca = $request["MARCAS_idMarca"];
        $producto->save();
        
        
        /**MODIFICACION - busco el producto y ACTUALIZO con los datos nuevos del formulario, retorno a admin 
         *  Producto::where('idProducto',$id)->update($productoModificado); OLD */


        return redirect("adminProductos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $producto = Producto::find($request["id"]);
        
        $producto->delete();   
        return redirect("adminProductos");
    }

    
    public function filtros($filtro){
        if($filtro == "Calzado Masculino"){
            $cat = 1;
        }elseif($filtro == "Calzado Femenino"){
            $cat = 2;
        }elseif($filtro == "Indumentaria Masculina"){
            $cat = 3;
        }elseif($filtro == "Indumentaria Femenina"){
            $cat = 4;
        }
        $listadoProductos = Producto::where('CATEGORIAS_idCategoria','=',$cat)->orderBy('idProducto','asc')->paginate(12);
        $vac = compact('listadoProductos');
        return view('productos', $vac);
    }


    public function listadoProductos(){
        $listadoProductos = Producto::orderBy('idProducto','asc')->paginate(12);
        $vac = compact('listadoProductos');
        return view('productos', $vac);
    }
}
