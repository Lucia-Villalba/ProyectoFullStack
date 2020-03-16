<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::orderBy('idMarca','asc')->paginate(4);
        $vac = compact("marcas");
        return view ('adminMarcas', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formAgregarMarcas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marcaNueva = new Marca();
        $reglas = [
            "nbMarca" => "string|min:2|max:45|required"
        ];
        $mensajes = [
            "string" => "El campo :attribute debe ser un texto",
            "min" => "El campo :attribute debe tener un mínimo de :min",
            "max" => "El campo :attribute debe tener un máximo de :max",
            "required" => "El campo :attribute debe ser completado"
        ];
        $this->validate($request, $reglas, $mensajes);

        $marcaNueva->nbMarca = $request["nbMarca"];
        $marcaNueva->save();
        return back()->with("estado", "La marca se agregó con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::find($id);
        return view("formModificarMarcas", compact("marca"));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Marca::where('idMarca',$id)->update($request->except(['_token','_method']));
        return redirect("adminMarcas");    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $marca = Marca::find($request["id"]);
        
        $marca->delete();   
        return redirect("adminMarcas");
    }
}
