<?php

namespace App\Http\Controllers;

use App\Centros;
use App\Registro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistroController extends Controller {

	public function postDatos(Request $request) {
		if ($request->isMethod('post')) {
			$registro = new Registro;
			$registro->interes = $request->input('interes');
			$registro->nombres = $request->input('nombres');
			$registro->apellidos = $request->input('apellidos');
			$registro->dni = $request->input('dni');
			$registro->email = $request->input('email');
			$registro->celular = $request->input('celular');
			$registro->telefono = $request->input('telefono');
			$registro->id_departamento = $request->input('departamento');
			$registro->id_provincia = $request->input('provincia');
			$registro->id_distrito = $request->input('distrito');
			$registro->direccion = $request->input('direccion');
			$registro->save();
			
			// evaluar el interes
			$centros = Centros::where('departamento', $request->input('departamento'))
					->where('provincia', $request->input('provincia'))
					->where('distrito', $request->input('distrito'))
					->get();
			
			return view('mensaje')->with('centros', $centros)->with('interes', $request->input('interes'));
		}
	}

}
