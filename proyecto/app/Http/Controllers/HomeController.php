<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

	public function getHome() {
		$departamentos = DB::table('correos')
			->join('ubigeo_departamento', 'correos.departamento', '=', 'ubigeo_departamento.id')
			->get();
		return view('home')->with('departamentos', $departamentos);
	}

}
