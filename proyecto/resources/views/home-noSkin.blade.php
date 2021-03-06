<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sdely</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
		<link href="{{ URL::to('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::to('/css/main.css') }}" rel="stylesheet" type="text/css">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>
			var baseUrl = '{{ URL::to('/') }}';
		</script>
	</head>
	<body class="noSkin">
		<section class="container">
			<div class="row">
				<div class="col-xs-12">
					<form name="formulario" id="formulario" action="{{ URL::to('/consultaDatos') }}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="no-skin" value="1">
						<div class="form-group">
							<select class="form-control" id="interes" name="interes" required>
								<option value="">Estás interesada(o) en:</option>
								<option value="promotora">Promotor(a)</option>
								<option value="centro">Centro de distribución</option>
								<option value="compra">Compra de un producto</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
						</div>
						<div class="form-group">
							<input type="tel" class="form-control" id="dni" name="dni" placeholder="Dni" required maxlength="8">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
						</div>
						<div class="form-group">
							<input type="tel" class="form-control" id="celular" name="celular" placeholder="Celular" required minlength="9" maxlength="9">
						</div>
						<div class="form-group">
							<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
						</div>
						<div class="form-group">
							<select class="form-control" id="departamento" name="departamento" required>
								<option value="">DEPARTAMENTO</option>
								@foreach($departamentos as $departamento)
								<option value="{{$departamento->id}}">{{$departamento->departamento}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<select class="form-control" id="provincia" name="provincia" required>
								<option value="">PROVINCIA</option>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control" id="distrito" name="distrito" required>
								<option value="">DISTRITO</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
						</div>
						<button type="submit" class="btn btn-default center-block">Enviar mis datos</button>
					</form>
				</div>
			</div>
		</section>
		<script src="{{ URL::to('/js/jquery.min.js') }}"></script>
		<script src="{{ URL::to('/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::to('/js/jquery-validation-1.15.0/jquery.validate.min.js') }}"></script>
		<script src="{{ URL::to('/js/main.js') }}"></script>
	</body>
</html>