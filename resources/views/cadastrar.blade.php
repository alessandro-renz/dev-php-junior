@extends("template")
@section("title", "Area de Cadastro")

@section("formulario_criacao")
<!-- Formulario !-->
<div class="container">
    <div class="card" style="margin-top: 15px">
        <div class="card-header">
          Area de Cadastro
        </div>
        <div class="card-body">
          <form action="{{$link_create}}" method="POST">
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
                  <input type="text" maxlength="11" name="telefone" id="telefone" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#cep">CEP:</label>
                  <input type="text" id="cep" maxlength="8" name="cep" id="cep" class="form-control" placeholder="Ex.: 99150000">
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
                  <input type="text" id="cidade" name="cidade" id="cidade" class="form-control bg-dark text-light">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="#estado">Estado:</label>
                  <input type="text" id="estado" name="estado" id="estado" class="form-control bg-dark text-light">
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
@section("ajax")
<script type="text/javascript">
    $("#cep").bind("focus",  function(){
        $(this).bind("keyup", function(){
          var cep = $("#cep").val();
          $("#cidade").attr("placeholder","Carregando...");
          $("#estado").attr("placeholder","Carregando...");

          if(cep.length == 8){
              $.ajax({
                url:"/dev-php-junior/public/users/getCEP",
                type:"POST",
                dataType:"json",
                data:{cep:cep},
                success:function(json){
                  if(json.erro == true){
                    $("#cidade").css("border", "3px solid red");
                    $("#estado").css("border", "3px solid red");
                    $("#cep").css("border", "3px solid red");
                    $("#cidade").attr("placeholder","Este cep não existe!");
                    $("#estado").attr("placeholder","Este cep não existe!");
                  }else{
                    $("#cidade").val(json.localidade);
                    $("#estado").val(json.uf);
                    $("#cidade").css("border", "3px solid green");
                    $("#estado").css("border", "3px solid green");
                    $("#cep").css("border", "3px solid green");
                  }
                  
                }
              });
          }
        });
    });
</script>
@endsection