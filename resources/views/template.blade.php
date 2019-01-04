<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<!-- puxando o title da pagina filho !-->
	<title>@yield("title")</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	
	<div class="container-fluid bg-topo">
      <header class="container">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <button type="button" class="navbar-toggler" data-target="#menu" data-toggle="collapse"><span class="navbar-toggler-icon text-light"></span></button> 
              <div id="menu" class="collapse navbar-collapse">
                  <ul class="navbar-nav mr-auto text-light">
                    <li class="nav-item"><a href="{{$link_home}}" class="nav-link text-light font-weight-bold">Home</a></li>
                    <li class="nav-item"><a href="{{$link_cadastro}}" class="nav-link text-light font-weight-bold">Cadastrar</a></li>
                  </ul>
              </div>
          </nav>
      </header>
  </div>
  @yield("tabela")
  @yield("formulario")
  @yield("perfil")
	<!-- não apagar!-->
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	
	
</body>
</html>