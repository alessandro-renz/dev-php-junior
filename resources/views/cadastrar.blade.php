@extends("template")
@section("title", "Area de Cadastro")

@section("formulario")
<!-- Formulario !-->
<div class="container">
    <div class="card" style="margin-top: 15px">
        <div class="card-header">
          Area de Cadastro
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="#nome">Nome:</label>
                  <input type="text" name="nome" id="nome" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="#cpf">CPF:</label>
                  <input type="text" maxlength="11" name="cpf" id="cpf" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#data">Data Nascimento:</label>
                  <input type="date" name="data" id="data" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="#email">Email:</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="#telefone">Telefone:</label>
                  <input type="text" name="telefone" id="telefone" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#cep">CEP:</label>
                  <input type="text" maxlength="8" name="cep" id="cep" class="form-control">
                  <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" class="text-link text-primary" target="_blank">Não sei meu cep</a>
                </div>
              </div>
            </div> 
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="#endereco">Endereço:</label>
                  <input type="text" name="endereco" id="endereco" placeholder="Ex.: Rua Antonio Abreu, 660" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="#cidade">Cidade:</label>
                  <input type="text" disabled name="cidade" id="cidade" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#estado">Estado:</label>
                  <input type="text" disabled name="estado" id="estado" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input type="submit" value="Cadastrar" class="btn btn-primary">
                <input type="reset" value="Limpar" class="btn btn-secondary">
              </div>
            </div> 
          </form>
        </div>
    </div>
</div>
@endsection
