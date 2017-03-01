<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sdely</title>
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
	<body class="formulario">
		<section class="container">
			<div class="row">
				<div class="col-sm-7 col-sm-offset-5">
					<p>
						<br>
						<img src="{{ URL::to('/images/titulo.png') }}" class="img-responsive center-block">
						<br>
					</p>
					<h1>
						<strong>404</strong> - Página no encontrada, por favor vuelve al <a href="{{ URL::to('/') }}">inicio</a>.
					</h1>
				</div>
			</div>
					
			<div class="row">
				<div class="col-xs-12">

				</div>
			</div>
		</section>
		<script src="{{ URL::to('/js/jquery.min.js') }}"></script>
		<script src="{{ URL::to('/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::to('/js/jquery-validation-1.15.0/jquery.validate.min.js') }}"></script>
		<script src="{{ URL::to('/js/main.js') }}"></script>
	</body>
</html>