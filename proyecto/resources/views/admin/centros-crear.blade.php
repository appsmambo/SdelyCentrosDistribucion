<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sdely - Admin</title>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
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
	<body>
		<div class="container">
			<h1>sdely</h1>
			<p>Admin - Nuevo centro</p>
			<form name="formulario" id="formulario" action="{{ URL::to('/admin159753/centros-crear') }}" method="post"  enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto" required>
				</div>
				<div class="form-group">
					<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
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
				<div class="form-group">
					<label for="foto">Foto del centro</label>
					<input type="file" id="foto" name="foto" accept="image/png, image/jpeg, image/gif">
				</div>
				<a href="{{URL::to('/admin159753/correos')}}" class="btn btn-default">Cancelar</a>
				<button type="submit" class="btn btn-primary">Enviar mis datos</button>
			</form>
			<script src="{{ URL::to('/js/jquery.min.js') }}"></script>
			<script src="{{ URL::to('/js/bootstrap.min.js') }}"></script>
			<script src="{{ URL::to('/js/jquery-validation-1.15.0/jquery.validate.min.js') }}"></script>
			<script src="{{ URL::to('/js/admin-main.js') }}"></script>
		</div>
	</body>
</html>