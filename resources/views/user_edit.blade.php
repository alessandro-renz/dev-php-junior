@extends("template")
@section("title", "Editar Usuário")

@section("formulario_edicao")
<!-- Formulario !-->
<div class="container">
    <div class="card" style="margin-top: 15px">
        <div class="card-header">
          Editar Usuario
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="#nome">Nome:</label>
                  <input type="text" name="nome" id="nome" value="{{$nome}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="#cpf">CPF:</label>
                  <input type="text" maxlength="11" value="{{$cpf}}" name="cpf" id="cpf" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#data">Data Nascimento:</label>
                  <input type="date" name="data" id="data" value="{{$data}}" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="#email">Email:</label>
                  <input type="email" name="email" value="{{$email}}" id="email" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="#telefone">Telefone:</label>
                  <input type="text" name="telefone" value="{{$telefone}}" id="telefone" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#cep">CEP:</label>
                  <input type="text" maxlength="8" value="{{$cep}}" name="cep" id="cep" class="form-control">
                  <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" class="text-link text-primary" target="_blank">Não sei meu cep</a>
                </div>
              </div>
            </div> 
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="#endereco">Endereço:</label>
                  <input type="text" name="endereco" value="{{$endereco}}" id="endereco" placeholder="Ex.: Rua Antonio Abreu, 660" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="#cidade">Cidade:</label>
                  <input type="text" name="cidade" value="{{$cidade}}" id="cidade" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#estado">Estado:</label>
                  <input type="text" name="estado" value="{{$estado}}" id="estado" class="form-control">
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
