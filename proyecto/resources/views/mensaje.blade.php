<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sdely</title>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<h1>sdely</h1>
			<p>Lista de centros de distribucion cercanos según tu dirección/ubicación:</p>
			<hr>
			@foreach($centros as $centro)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">{{$centro->nombre}}</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-9">
							<p>Contacto: {{$centro->contacto}}<br>Tel: {{$centro->telefono}}<br>Dirección: {{$centro->direccion}}</p>
						</div>
						<div class="col-sm-3">
							<img src="{{ URL::to('/') }}/images/centros/{{$centro->foto}}" class="img-responsive" alt="">
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</body>
</html>