<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Excel;
use App\Correos;
use App\Centros;
use App\Registro;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller {

	public function getCorreos() {
		$correos = DB::table('correos')
				->join('ubigeo_departamento', 'correos.departamento', '=', 'ubigeo_departamento.id')
				->select('correos.*', 'ubigeo_departamento.departamento')
				->get();
		return view('admin.correos')->with('correos', $correos);
	}

	public function getCorreosCrear() {
		$departamentos = Departamento::all();
		return view('admin.correos-crear')->with('departamentos', $departamentos);
	}

	public function postCorreosCrear(Request $request) {
		if ($request->isMethod('post')) {
			$correos = new Correos();
			$correos->departamento = $request->input('departamento');
			$correos->correo_1 = $request->input('correo_1');
			$correos->correo_2 = $request->input('correo_2');
			$correos->save();
			return redirect('admin159753/correos');
		}
	}

	public function getCorreosEditar(Request $request) {
		$id = $request->input('id');
		$correo = Correos::find($id);
		$departamentos = Departamento::all();
		return view('admin.correos-editar')->with('correo', $correo)->with('departamentos', $departamentos);
	}

	public function postCorreosEditar(Request $request) {
		if ($request->isMethod('post')) {
			$correos = Correos::find($request->input('id'));
			$correos->departamento = $request->input('departamento');
			$correos->correo_1 = $request->input('correo_1');
			$correos->correo_2 = $request->input('correo_2');
			$correos->save();
			return redirect('admin159753/correos');
		}
	}

	public function getCentros() {
		$centros = DB::table('centros')
				->join('ubigeo_departamento', 'centros.departamento', '=', 'ubigeo_departamento.id')
				->join('ubigeo_provincia', 'centros.provincia', '=', 'ubigeo_provincia.id')
				->join('ubigeo_distrito', 'centros.distrito', '=', 'ubigeo_distrito.id')
				->select('centros.*', 'ubigeo_departamento.departamento', 'ubigeo_provincia.provincia', 'ubigeo_distrito.distrito')
				->get();
		return view('admin.centros')->with('centros', $centros);
	}

	public function getCentrosCrear() {
		$departamentos = Departamento::all();
		return view('admin.centros-crear')->with('departamentos', $departamentos);
	}

	public function postCentrosCrear(Request $request) {
		if ($request->isMethod('post')) {
			$centros = new Centros();
			$centros->nombre = $request->input('nombre');
			$centros->contacto = $request->input('contacto');
			$centros->telefono = $request->input('telefono');
			$centros->departamento = $request->input('departamento');
			$centros->provincia = $request->input('provincia');
			$centros->distrito = $request->input('distrito');
			$centros->direccion = $request->input('direccion');
			if ($request->hasFile('foto')) {
				$extension = pathinfo($request->foto, PATHINFO_EXTENSION);
				$archivo = time() . '.' . $extension;
				$request->foto->move(public_path('images/centros'), $archivo);
				$centros->foto = $archivo;
			}
			$centros->save();
			return redirect('admin159753/centros');
		}
	}

	public function getCentrosEditar(Request $request) {
		$id = $request->input('id');
		$centros = Centros::find($id);
		$departamentos = Departamento::all();
		$provincias = Provincia::where('id_departamento', '=', $centros->departamento)->get();
		$distritos = Distrito::where('id_provincia', '=', $centros->provincia)->get();
		return view('admin.centros-editar')->with('centros', $centros)->with('departamentos', $departamentos)->with('provincias', $provincias)->with('distritos', $distritos);
	}

	public function postCentrosEditar(Request $request) {
		if ($request->isMethod('post')) {
			$centros = Centros::find($request->input('id'));
			$centros->nombre = $request->input('nombre');
			$centros->contacto = $request->input('contacto');
			$centros->telefono = $request->input('telefono');
			$centros->departamento = $request->input('departamento');
			$centros->provincia = $request->input('provincia');
			$centros->distrito = $request->input('distrito');
			$centros->direccion = $request->input('direccion');
			if ($request->hasFile('foto')) {
				$extension = pathinfo($request->foto, PATHINFO_EXTENSION);
				$archivo = time() . '.' . $extension;
				$request->foto->move(public_path('images/centros'), $archivo);
				$centros->foto = $archivo;
			}
			$centros->save();
			return redirect('admin159753/centros');
		}
	}

	public function getRegistros() {
		$registros = DB::table('registro')
				->join('ubigeo_departamento', 'registro.id_departamento', '=', 'ubigeo_departamento.id')
				->select('registro.*', 'ubigeo_departamento.departamento')
				->orderBy('id', 'desc')
				->get();
		return view('admin.registros')->with('registros', $registros);
	}

	public function getRegistrosExport() {
		$registros = DB::table('registro')
			->join('ubigeo_departamento', 'registro.id_departamento', '=', 'ubigeo_departamento.id')
			->select('registro.*', 'ubigeo_departamento.departamento')
			->get()
			->toArray();
		Excel::create('Registros', function($excel) use($registros) {
			$excel->sheet('data', function($sheet) use($registros) {
				$sheet->appendRow(array(
							'interes', 
							'nombres', 
							'apellidos', 
							'dni', 
							'email',
							'celular',
							'telefono',
							'departamento',
							'direccion'
						));
				foreach($registros as $registro) {
					$sheet->appendRow(array(
						$registro->interes, 
						$registro->nombres, 
						$registro->apellidos, 
						$registro->dni,
						$registro->email,
						$registro->celular,
						$registro->telefono,
						$registro->departamento,
						$registro->direccion
					));
				}
				//$sheet->fromArray($registros);
			});
		})->export('xlsx');
	}
	
	public function getRegistrosBorrar($id) {
		$registro = Registro::find($id);
		$registro->delete();
		return redirect('admin159753/registros');
	}
	
	public function getRegistrosContactado($id, $value = 0) {
		$registro = Registro::find($id);
		$registro->contactado = $value;
		$registro->save();
		return redirect('admin159753/registros');
	}
	
	public function getRegistrosAfiliado($id, $value = 0) {
		$registro = Registro::find($id);
		$registro->afiliado = $value;
		$registro->save();
		return redirect('admin159753/registros');
	}

}
