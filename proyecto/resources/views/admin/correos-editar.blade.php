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
			<p>Admin - Nuevo correo</p>
			<form name="formulario" id="formulario" action="{{ URL::to('/admin159753/correos-editar') }}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{$correo->id}}">
				<div class="form-group">
					<select class="form-control" id="departamento" name="departamento" required>
						<option value="">DEPARTAMENTO</option>
						@foreach($departamentos as $departamento)
						<option value="{{$departamento->id}}" {{($departamento->id == $correo->departamento) ? 'selected' : ''}}>{{$departamento->departamento}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="email" class="form-control" id="correo_1" name="correo_1" placeholder="Email" required value="{{$correo->correo_1}}">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" id="correo_2" name="correo_2" placeholder="Email" value="{{$correo->correo_2}}">
				</div>
				<a href="{{URL::to('/admin159753/correos')}}" class="btn btn-default">Cancelar</a>
				<button type="submit" class="btn btn-primary">Actualizar datos</button>
			</form>
			<script src="{{ URL::to('/js/jquery.min.js') }}"></script>
			<script src="{{ URL::to('/js/bootstrap.min.js') }}"></script>
			<script src="{{ URL::to('/js/jquery-validation-1.15.0/jquery.validate.min.js') }}"></script>
			<script>
				$(function() {
					$("#formulario").validate();
				});
			</script>
		</div>
	</body>
</html>