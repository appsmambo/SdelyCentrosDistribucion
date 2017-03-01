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
			
			// si es centro, enviar correo según el departamento
			if ($request->input('interes') == 'centro') {
				$mails = array();
				$correos = Correos::where('departamento', '=', $request->input('departamento'))->get();
				foreach ($correos as $correo) {
					$mails[] = $correo->correo_1;
					$mails[] = $correo->correo_2;
				}
				
				$correo = implode(',', $mails);
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
				mail($correo, $asunto, $body, $headers);
			}
			
			$centros = Centros::where('departamento', $request->input('departamento'))
					->where('provincia', $request->input('provincia'))
					->get();
			
			return view('mensaje')->with('centros', $centros)->with('interes', $request->input('interes'));
		}
	}

}
