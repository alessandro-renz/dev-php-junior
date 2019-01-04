@extends("template")
@section("title", "Lista de usuários")
@section("tabela")
<div class="container">
	<div class="card" style="margin-top: 15px">
		<div class="card-header">
			<a href="#" class="btn btn-primary">Adicionar Usuário</a>
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
					<tr>
						<td>a</td>
						<td>b</td>
						<td>c</td>
						<td>
							<a href="#" class="text-link">Ver mais</a>
						</td>
						
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
</div>
@endsection
