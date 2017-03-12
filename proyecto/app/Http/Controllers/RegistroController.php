<?php

namespace App\Http\Controllers;

use App\Centros;
use App\Empresa;
use App\Registro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistroController extends Controller {

	public function postDatos(Request $request) {
		if ($request->isMethod('post')) {
			// datos de la empresa
			$empresa = Empresa::take(1)->get();
			
			$correos = array();
			$correos[] = $empresa[0]->correo;
			
			// grabar registro
//			$registro = new Registro;
//			$registro->interes = $request->input('interes');
//			$registro->nombres = $request->input('nombres');
//			$registro->apellidos = $request->input('apellidos');
//			$registro->dni = $request->input('dni');
//			$registro->email = $request->input('email');
//			$registro->celular = $request->input('celular');
//			$registro->telefono = $request->input('telefono');
//			$registro->id_departamento = $request->input('departamento');
//			$registro->id_provincia = $request->input('provincia');
//			$registro->id_distrito = $request->input('distrito');
//			$registro->direccion = $request->input('direccion');
//			$registro->save();
			
			// verificar existencia de centros
			$centros = Centros::where('departamento', $request->input('departamento'))
					->where('provincia', $request->input('provincia'))
					->where('distrito', $request->input('distrito'))
					->get();

			// si interes es promotora, enviar correo según el departamento
			if ($request->input('interes') == 'promotora') {
				if (!$centros->count()) {
					foreach ($centros as $centro) {
						$correos[] = $centro->correo_1;
						if (!empty($centro->correo_2)) {
							$correos[] = $centro->correo_2;
						}
					}
				}
			}
			
			// enviar el email
			$correos = implode(',', $correos);
			$this->enviarMail($correos, $request);
			
			return view('mensaje')
					->with('centros', $centros)
					->with('interes', $request->input('interes'))
					->with('empresa', $empresa);
		}
	}
	
	private function enviarMail($correos, $request) {
		$asunto = 'Datos desde Facebook';
		$mensaje = 'Interes: ' . $request->input('interes');
		$mensaje .= 'Nombres: ' . $request->input('nombres')."\r\n";
		$mensaje .= 'Apellidos: ' . $request->input('apellidos')."\r\n";
		$mensaje .= 'DNI: ' . $request->input('dni')."\r\n";
		$mensaje .= 'Email: ' . $request->input('email')."\r\n";
		$mensaje .= 'Celular: ' . $request->input('celular')."\r\n";
		$mensaje .= 'Telefono: ' . $request->input('telefono')."\r\n";
		$mensaje .= 'Direccion: ' . $request->input('direccion')."\r\n";
		//header
		$boundary = md5("AppsWebs");
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "From: FBTab<no-reply@apps.com>\r\n";
		$headers .= "Reply-To: ".$request->input('nombres').' <'.$request->input('email').'>'."\r\n";
		$headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n";
		$headers .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
		//plain text 
		$body = "--$boundary\r\n";
		$body .= "Content-Type: text/plain; charset=UTF-8\r\n";
		$body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
		$body .= chunk_split(base64_encode($mensaje)); 
		//enviar
		mail($correos, $asunto, $body, $headers);
	}

}
