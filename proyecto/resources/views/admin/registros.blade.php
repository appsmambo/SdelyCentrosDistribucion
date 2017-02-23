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
			<p>Admin</p>
			<a href="{{URL::to('/admin159753')}}" class="btn btn-danger">Atrás</a>
			<a href="{{URL::to('/admin159753/registros-export')}}" class="btn btn-primary">Descargar registros</a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Interés</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Email</th>
						<th>Celular</th>
						<th>Departamento</th>
					</tr>
				</thead>
				<tbody>
					@foreach($registros as $registro)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$registro->interes}}</td>
						<td>{{$registro->nombres}}</td>
						<td>{{$registro->apellidos}}</td>
						<td>{{$registro->email}}</td>
						<td>{{$registro->celular}}</td>
						<td>{{$registro->departamento}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</body>
</html>