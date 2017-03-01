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
	<body class="respuesta">
		<section class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-4">
					<p>
						<br>
						<img src="{{ URL::to('/images/titulo-respuesta.png') }}" class="img-responsive center-block">
						<br>
					</p>
					<div class="mensaje">
						@if ($interes == 'promotora')
						@forelse($centros as $centro)
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-8">
										<p>
											<strong>{{$centro->nombre}}</strong><br>
											Contacto: {{$centro->contacto}}<br>
											Tel: {{$centro->telefono}}<br>
											Dirección: {{$centro->direccion}}</p>
									</div>
									<div class="col-sm-4">
										<img src="{{ URL::to('/') }}/images/centros/{{$centro->foto}}" class="img-responsive" alt="">
									</div>
								</div>
							</div>
						</div>
						@empty
						<h3>No se encontraron centros de distribucion cerca a tu zona.</h3>
						@endforelse
						@endif
						@if ($interes == 'centro')
						<h3>Nos pondremos en contacto contigo.</h3>
						@endif
						@if ($interes == 'compra')
						<h3>Compra aquí.</h3>
						@endif
					</div>
					<img src="{{ URL::to('/images/logo.png') }}" class="img-responsive pull-right" alt="">
					<div class="clearfix"></div>
					<p class="text-right">
						<br>
						Av. Jose Maria Plaza 270 - Jesús Maria<br>
						(01) 423 - 1700 / (01) 423 - 1832<br>
						<a href="https://www.laboutiquecatalogos.com/" target="_blank">www.laboutiquecatalogos.com</a><br>
						Lima - Perú
					</p>
				</div>
			</div>
		</section>
	</body>
</html>