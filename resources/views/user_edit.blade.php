@extends("template")
@section("title", "Editar Usuário")

@section("body")
<!-- Formulario !-->
<div class="container">
    
    @if(!empty($success) && $success == true)
      @component("components.alert",["type"=>"success"])
          Usuario editado com sucesso, <a href="/users" class="alert-link">clique aqui para ver a lista.</a>  
      @endcomponent  
    @endif
    <div class="card" style="margin-top: 15px">
        <div class="card-header">
          Editar Usuario
        </div>
        <div class="card-body">
          <form action="/users/{{$id_user}}/update" method="POST">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="#nome">Nome:</label>
                  <input type="text" name="nome" id="nome" value="{{$nome}}" class="form-control {{ $errors->has('nome') ? 'is-invalid':''}}">
                  @if($errors->has('nome'))
                    <div class="invalid-feedback">
                      {{ $errors->first('nome') }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="#cpf">CPF:</label>
                  <input type="text" maxlength="11" value="{{$cpf}}" name="cpf" id="cpf" class="form-control {{ $errors->has('cpf') ? 'is-invalid':''}}">
                  @if($errors->has('cpf'))
                    <div class="invalid-feedback">
                      {{ $errors->first('cpf') }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#data">Data Nascimento:</label>
                  <input type="date" name="data" id="data" value="{{$data}}" class="form-control {{ $errors->has('data') ? 'is-invalid':''}}">
                  @if($errors->has('data'))
                    <div class="invalid-feedback">
                      {{ $errors->first('data') }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="#email">Email:</label>
                  <input type="email" name="email" value="{{$email}}" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid':''}}">
                  @if($errors->has('email'))
                    <div class="invalid-feedback">
                      {{ $errors->first('email') }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="#telefone">Telefone:</label>
                  <input type="text" maxlength="11" name="telefone" value="{{$telefone}}" id="telefone" class="form-control {{ $errors->has('telefone') ? 'is-invalid':''}}">
                  @if($errors->has('telefone'))
                    <div class="invalid-feedback">
                      {{ $errors->first('telefone') }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#cep">CEP:</label>
                  <input type="text" maxlength="8" value="{{$cep}}" name="cep" id="cep" class="form-control {{ $errors->has('cep') ? 'is-invalid':''}}">
                  @if($errors->has('cep'))
                    <div class="invalid-feedback">
                      {{ $errors->first('cep') }}
                    </div>
                  @endif
                </div>
              </div>
            </div> 
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="#endereco">Endereço:</label>
                  <input type="text" name="endereco" value="{{$endereco}}" id="endereco" placeholder="Ex.: Rua Antonio Abreu, 660" class="form-control {{ $errors->has('endereco') ? 'is-invalid':''}}">
                  @if($errors->has('endereco'))
                    <div class="invalid-feedback">
                      {{ $errors->first('endereco') }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="#cidade">Cidade:</label>
                  <input type="text" name="cidade" value="{{$cidade}}" id="cidade" class="form-control {{ $errors->has('cidade') ? 'is-invalid':''}}">
                  @if($errors->has('cidade'))
                    <div class="invalid-feedback">
                      {{ $errors->first('cidade') }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#estado">Estado:</label>
                  <input type="text" name="estado" value="{{$estado}}" id="estado" class="form-control {{ $errors->has('estado') ? 'is-invalid':''}}">
                  @if($errors->has('estado'))
                    <div class="invalid-feedback">
                      {{ $errors->first('estado') }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input type="submit" value="Editar" class="btn btn-primary">
                <a href="{{$link_home}}" class="btn btn-secondary">Voltar</a>
              </div>
            </div> 
          </form>
        </div>
    </div>
</div>
@endsection


