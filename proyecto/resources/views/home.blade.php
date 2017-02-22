<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sdely</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/main.css" rel="stylesheet" type="text/css">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>
			var baseUrl = '{{ URL::to('/') }}';
		</script>
	</head>
	<body>
		<div class="container">
			<h1>sdely</h1>
			<p>Llena el formulario y en breve llegará un correo a tu bandeja de entrada.</p>
			<form name="formulario" id="formulario" action="{{ URL::to('/consultaDatos') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<select class="form-control" id="interes" name="interes" required>
						<option value="">Estás interesada en:</option>
						<option value="promotora">Promotora</option>
						<option value="centro">Centro de distribbución</option>
						<option value="compra">Compra de producto</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
				</div>
				<div class="form-group">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
					<input type="tel" class="form-control" id="celular" name="celular" placeholder="Celular" required>
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
				<button type="submit" class="btn btn-default">Enviar mis datos</button>
			</form>
			<div class="row">
				<div class="col-xs-12">

				</div>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-validation-1.15.0/jquery.validate.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>