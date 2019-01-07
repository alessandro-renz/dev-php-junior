@extends("template")
@section("title", "Lista de usuários")
@section("tabela")
<div class="container">
	@if(count($users) == 0)
		<div class="alert alert-danger" style="margin-top: 15px"><strong>Não há usuários cadastrados!</strong></div>
	@else
	<div class="card" style="margin-top: 15px">
		<div class="card-header">
			<a href="{{$link_cadastro}}" class="btn btn-primary">Adicionar Usuário</a>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nome</th>
						<th>CPF</th>
						<th>Email</th>
						<th>Link</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $u)
					<tr>
						<td>{{$u->nome}}</td>
						<td>{{$u->CPF}}</td>
						<td>{{$u->email}}</td>
						<td>
							<a href="/users/{{$u->id}}/show" class="text-link">Ver mais</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@endif
</div>
@endsection
