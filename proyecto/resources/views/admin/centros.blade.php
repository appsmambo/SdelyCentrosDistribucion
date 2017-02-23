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
			<a href="{{URL::to('/admin159753/centros-crear')}}" class="btn btn-info">Crear registro</a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th></th>
						<th>Centro</th>
						<th>Contacto</th>
						<th>Departamento</th>
					</tr>
				</thead>
				<tbody>
					@foreach($centros as $centro)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td><a href="{{URL::to('/admin159753/centros-editar?id=' . $centro->id)}}" class="btn btn-warning">Editar</a></td>
						<td>{{$centro->nombre}}</td>
						<td>{{$centro->contacto}}</td>
						<td>{{$centro->departamento}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</body>
</html>