<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sdely - Admin</title>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/main.css" rel="stylesheet" type="text/css">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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
			<div class="row">
				<div class="col-sm-4">
					<a href="{{URL::to('/admin159753/correos')}}" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Correos por provincia
					</a>
				</div>
				<div class="col-sm-4">
					<a href="{{URL::to('/admin159753/centros')}}" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Centros de distribución
					</a>
				</div>
				<div class="col-sm-4">
					<a href="{{URL::to('/admin159753/registros')}}" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Registros de formulario
					</a>
				</div>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-validation-1.15.0/jquery.validate.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>