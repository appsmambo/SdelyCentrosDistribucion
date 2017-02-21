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
			<p>Llena el formulario y en breve llegará un correo a tu bandeja de entrada.</p>
			<form name="formulario" id="formulario" action="{{ URL::to('/consultaDatos') }}" method="post">
				{{ csrf_field() }}
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
						<option value="1">AMAZONAS</option>
						<option value="2">ANCASH</option>
						<option value="3">APURIMAC</option>
						<option value="4">AREQUIPA</option>
						<option value="5">AYACUCHO</option>
						<option value="6">CAJAMARCA</option>
						<option value="7">CALLAO</option>
						<option value="8">CUSCO</option>
						<option value="9">HUANCAVELICA</option>
						<option value="10">HUANUCO</option>
						<option value="11">ICA</option>
						<option value="12">JUNIN</option>
						<option value="13">LA LIBERTAD</option>
						<option value="14">LAMBAYEQUE</option>
						<option value="15">LIMA</option>
						<option value="16">LORETO</option>
						<option value="17">MADRE DE DIOS</option>
						<option value="18">MOQUEGUA</option>
						<option value="19">PASCO</option>
						<option value="20">PIURA</option>
						<option value="21">PUNO</option>
						<option value="22">SAN MARTIN</option>
						<option value="23">TACNA</option>
						<option value="24">TUMBES</option>
						<option value="25">UCAYALI</option>
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