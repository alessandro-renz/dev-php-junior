@extends("template")
@section("title", "Perfil do usuário")
@section("perfil")
	@empty($user)
	<div class="container">
		<div class="alert alert-danger" style="margin-top: 15px"><strong>Este usuário não existe!</strong></div>
	</div>
	@else
	<div class="container">
		<div class="card" style="margin-top: 15px">
			<div class="card-header">Perfil</div>
			<div class="card-body">
				<h4><strong>Nome:</strong></h4>
				<p>{{$user->nome}}</p>
				<h4><strong>CPF:</strong></h4>
				<p>{{$user->CPF}}</p>
				<h4><strong>Data Nascimento:</strong></h4>
				<p>{{$user->data_nascimento}}</p>
				<h4><strong>Email:</strong></h4>
				<p>{{$user->email}}</p>
				<h4><strong>Telefone:</strong></h4>
				<p>{{$user->telefone}}</p>
				<h4><strong>Endereço:</strong></h4>
				<p>{{$user->endereco}}</p>
				<h4><strong>Cidade:</strong></h4>
				<p>{{$user->cidade}}</p>
				<h4><strong>Estado:</strong></h4>
				<p>{{$user->estado}}</p>
			</div>
		</div>

		<div class="card-footer">
			<a href="{{$link_home}}" class="btn btn-secondary">Voltar</a>
			<a href="#" class="btn btn-primary">Editar</a>
			<a href="{{$link_delete}}" class="btn btn-danger">Deletar</a>
		</div>
	</div>
	@endif
@endsection	