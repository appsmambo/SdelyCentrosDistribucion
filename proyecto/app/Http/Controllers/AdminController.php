<?php

namespace App\Http\Controllers;

use App\Correos;
use App\Centros;
use App\Registro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistroController extends Controller {

	public function getcorreos() {
		$correos = Correos::all();
		return view('admin.correos')->with('correos', $correos);
	}
	
	public function postDatos(Request $request) {
		if ($request->isMethod('post')) {
			$registro = new Registro;
			$registro->nombres = $request->input('nombres');
			$registro->apellidos = $request->input('apellidos');
			$registro->email = $request->input('email');
			$registro->celular = $request->input('celular');
			$registro->telefono = $request->input('telefono');
			$registro->departamento = $request->input('departamento');
			$registro->provincia = $request->input('provincia');
			$registro->distrito = $request->input('distrito');
			$registro->save();
			
			$centros = Centros::where('departamento', $request->input('departamento'))
					->where('provincia', $request->input('provincia'))
					->where('distrito', $request->input('distrito'))
					->get();
			
			return view('mensaje')->with('centros', $centros);
		}
	}

}
