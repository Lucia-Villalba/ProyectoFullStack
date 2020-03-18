<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idU)
    {
        $reglas = [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            "imgUser" => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']   
        ];
        $mensajes = [
            "string" => "El campo debe ser un texto",
            "max" => "El campo debe tener un máximo de :max",
            "min" => "El campo debe tener un mínimo de :min",
            "required" => "El campo debe ser completado",
            "date " => "El campo debe ser una fecha correcta",
            "filled" => "El campo no debe estar vacio",
            "imgUser.image" => "Solo puede subir un archivo de imagen con extensión jpeg, png, jpg, gif o svg",
            "imgUser.mimes" => "Solo puede subir un archivo de imagen con extensión jpeg, png, jpg, gif o svg",
            "imgUser.max" => "La imagen cargada puede tener hasta 2048px"
        ];
        $this->validate($request, $reglas, $mensajes);

        $User = User::find($idU);

        if ($request->file("imgUser")){
            $nombreArchivo = time().$request->file("imgUser")->getClientOriginalName();
            $ruta = basename($request->file("imgUser")->move(public_path('img/avatars'), $nombreArchivo));
            $User->imgUser = $ruta;

        }

        $User->name = $request['name'];
        $User->surname = $request['surname'];
        $User->fecha = $request['fecha'];
        $User->save();


        return back()->with("estado", "Sus datos fueron modificados con éxito");
    }
}
