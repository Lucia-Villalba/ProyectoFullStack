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
        ];
        $mensajes = [
            "string" => "El campo debe ser un texto",
            "max" => "El campo debe tener un máximo de :max",
            "min" => "El campo debe tener un mínimo de :min",
            "required" => "El campo debe ser completado",
            "date " => "El campo debe ser una fecha correcta",
            "filled" => "El campo no debe estar vacio"
        ];
        $this->validate($request, $reglas, $mensajes);

        $User = User::find($idU);

        $User->name = $request['name'];
        $User->surname = $request['surname'];
        $User->fecha = $request['fecha'];
        $User->save();


        return back()->with("estado", "Sus datos fueron modificados con éxito");
    }
}
