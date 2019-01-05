<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<!-- puxando o title da pagina filho !-->
	<title>Inicio</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-6">
				<div class="card" style="margin-top: 50%;">
					<div class="card-header text-light bg-primary">Teste dev-php-junior</div>
					<div class="card-body">
						<p>Seja bem vindo ao teste dev-php-junior, espero que goste...</p>
						<a href="{{$link}}" class="btn btn-primary">Entrar no sistema</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- não apagar!-->
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	
	
</body>
</html>