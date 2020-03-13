<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('idCategoria','asc')->paginate(8);
        $vac = compact("categorias");
        return view ('adminCategorias', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("formAgregarCategorias");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoriaNueva = new Categoria();
        $reglas = [
            "nbCategoria" => "string|min:3|max:45|required"
        ];
        $mensajes = [
            "string" => "El campo :attribute debe ser un texto",
            "min" => "El campo :attribute debe tener un mínimo de :min caracteres",
            "max" => "El campo :attribute debe tener un máximo de :max caracteres",
            "required" => "El campo :attribute debe ser completado"
        ];
        $this->validate($request, $reglas, $mensajes);

        $categoriaNueva->nbCategoria = $request["nbCategoria"];
        $categoriaNueva->save();
        return back()->with("estado", "La categoría se agregó con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("formAgregarCategorias");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view("formModificarCategorias", compact("categoria"));
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
        Categoria::where('idCategoria',$id)->update($request->except(['_token','_method']));
        return redirect("adminCategorias");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $categoria = Categoria::find($request["id"]);

        $categoria->delete();   
        return redirect("adminCategorias");
    }
}
