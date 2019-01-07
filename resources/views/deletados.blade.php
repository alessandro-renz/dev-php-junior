@extends("template")
@section("title", "Lista de deletados")
@section("tabela_deletados")
<div class="container">
	@if(!empty($msg_delete) && $msg_delete == true)
      @component("components.alert",["type"=>"success"])
          Usuário deletado do banco de dados com sucesso! 
      @endcomponent
    @elseif(!empty($restore) && $restore == true)
      @component("components.alert",["type"=>"success"])
          Usuario restaurado com sucesso, <a href="/users" class="alert-link">clique aqui para ver a lista.</a>  
      @endcomponent
	@endif
	@if(count($deletes) > 0)
	<div class="card" style="margin-top: 15px">
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
					@foreach($deletes as $d)
					<tr>
						<td>{{$d->nome}}</td>
						<td>{{$d->CPF}}</td>
						<td>{{$d->email}}</td>
						<td>
							<a href="/users/{{$d->id}}/force_delete" class="btn btn-danger">Deletar do BD</a>
							<a href="/users/{{$d->id}}/restaurar" class="btn btn-primary">Restaurar</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@else
      @component("components.alert",["type"=>"warning"])
          Não há usuários deletados!
      @endcomponent
    @endif
</div>
@endsection
