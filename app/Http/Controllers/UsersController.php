<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuario;

class UsersController extends Controller
{
	public function getUsers()
	{
   		$data = array();
      //pegando todos os usuarios da tabela usuarios
      $data = Usuario::orderBy("id","desc")->get();
         
   		
   		return view('home', [
        "link_exit"=>route("index"),
        "link_lixeira"=>route("trash"),
   			"link_home"=>route("home"),
   			"link_cadastro"=>route("cadastrar"),
   			"users"=>$data
   		]);
	}
	public function getUserById($id)
	{
   		$user = array();
      $user = Usuario::where("id", $id)->first();
   		if(!isset($user)){
   			return redirect()->route("home");
   			exit;
   		}else{
          /*
          *Foi feito alguns ajustes nos dados vindos do banco de dados
          *para que fiquem em formato adequado de visualização.Ex.:
          *CEP - 99999-000
          *celular - (54) 991420685 
          */
          $getdate = $user->data_nascimento;
          $date = explode("-", $getdate);
          $date = $date[2]."/".$date[1]."/".$date[0];
          $cpf = $user->CPF;
          $new_cpf[0] = substr($cpf, 0, 3);
          $new_cpf[1] = substr($cpf, 3, 3);
          $new_cpf[2] = substr($cpf, 6, 3);
          $new_cpf[3] = substr($cpf, 9, 2);
          $cpf = $new_cpf[0].".".$new_cpf[1].".".$new_cpf[2]."-".$new_cpf[3];
          $telefone = $user->telefone;
          $new_telefone[0] = substr($telefone, 0, 2);
          $new_telefone[1] = substr($telefone, 2, strlen($telefone));
          $telefone = "(".$new_telefone[0].")"." ".$new_telefone[1];
          $cep = $user->CEP;
          $new_cep[0] = substr($cep, 0, 5);
          $new_cep[1] = substr($cep, 5, strlen($cep));
          $cep = $new_cep[0]."-".$new_cep[1];

          return view('show_user', [
            "link_delete"=>"/users/$user->id/$user->nome/delete",
            "link_edit"=>"/users/$user->id/edit",
            "link_exit"=>route("index"),
            "link_home"=>route("home"),
            "link_cadastro"=>route("cadastrar"),
            "link_lixeira"=>route("trash"),
            "user"=>$user,
            "date"=>$date,
            "telefone"=>$telefone,
            "cpf"=>$cpf,
            "cep"=>$cep
          ]);
      }
      
   	}
   	public function delete($id, $nome)
   	{
   		$user = Usuario::find($id);
      if(!isset($user)){
            return redirect()->route("home");
            exit;
         }else{
            if($user->id == $id && $user->nome == $nome){
               $user->delete();
               return redirect()->route("home");
               exit;
            } 
         }

      }
      public function edit($id){
        $user = Usuario::find($id);

        if(!isset($user)){
            return redirect()->route("home");
            exit;
          }else{
              return view('user_edit', [
                  "id_user"=>$user->id,
                  "nome"=>$user->nome,
                  "cpf"=>$user->CPF,
                  "data"=>$user->data_nascimento,
                  "email"=>$user->email,
                  "telefone"=>$user->telefone,
                  "endereco"=>$user->endereco,
                  "cidade"=>$user->cidade,
                  "estado"=>$user->estado,
                  "cep"=>$user->CEP,
                  "link_exit"=>route("index"),
                  "link_home"=>route("home"),
                  "link_cadastro"=>route("cadastrar"),
                  "link_lixeira"=>route("trash")
              ]);
           
          }
      }
      public function getCEP(Request $r){
          $cep = $r->input("cep");
          if(isset($cep)){
            $url = 'viacep.com.br/ws/'.$cep.'/json/'; 
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);

            return $response; 
          }else{
            return redirect()->route("home");
          } 
      }
      public function update(Request $r, $id)
      {
              $user = Usuario::find($id);
              if(empty($user)){
                  return redirect()->route("home");
                  exit;
              }
              //criando mensagens de erros para o usuario
              $mensages= array(
                "required"=>"O campo deve estar preenchido!",
                "cpf.min"=>"O CPF deve ter 11 números",
                "email.email"=>"Insira um email válido",
                "telefone.min"=>"O telefone deve conter 11 numeros, DDD + código",
                "cep.min"=>"O CEP deve ter 8 números"
              );

              //validando os dados antes de inserir na tabela usuarios
              $r->validate([
                "nome"=>"required",
                "cpf"=>"required|min:11",
                "data"=>"required",
                "email"=>"required|email",
                "telefone"=>"required|min:11",
                "endereco"=>"required",
                "cidade"=>"required",
                "estado"=>"required",
                "cep"=>"required|min:8"
              ], $mensages);

              //inserindo novos dados na tabela usuarios
              $user->nome = $r->input("nome");
              $user->CPF = $r->input("cpf");
              $user->data_nascimento = $r->input("data");
              $user->email = $r->input("email");
              $user->telefone = $r->input("telefone");
              $user->endereco = $r->input("endereco");
              $user->cidade = $r->input("cidade");
              $user->estado = $r->input("estado");
              $user->CEP = $r->input("cep");
              $user->save();

              return view('user_edit', [
                    "success"=>true,
                    "id_user"=>$user->id,
                    "nome"=>$user->nome,
                    "cpf"=>$user->CPF,
                    "data"=>$user->data_nascimento,
                    "email"=>$user->email,
                    "telefone"=>$user->telefone,
                    "endereco"=>$user->endereco,
                    "cidade"=>$user->cidade,
                    "estado"=>$user->estado,
                    "cep"=>$user->CEP,
                    "link_exit"=>route("index"),
                    "link_home"=>route("home"),
                    "link_cadastro"=>route("cadastrar"),
                    "link_lixeira"=>route("trash")
              ]);
          
      }

      public function create(Request $r)
      {
            //criando mensagens de erros para o usuario
            $mensages= array(
              "required"=>"O campo deve estar preenchido!",
              "cpf.min"=>"O CPF deve ter 11 números",
              "email.email"=>"Insira um email válido",
              "telefone.min"=>"O telefone deve conter 11 numeros, DDD + código",
              "cep.min"=>"O CEP deve ter 8 números"
            );

            //validando os dados antes de inserir na tabela usuarios
            $r->validate([
              "nome"=>"required",
              "cpf"=>"required|min:11",
              "data"=>"required",
              "email"=>"required|email",
              "telefone"=>"required|min:11",
              "endereco"=>"required",
              "cidade"=>"required",
              "estado"=>"required",
              "cep"=>"required|min:8"
            ], $mensages);

            //inserindo novos dados na tabela usuarios
            $user = new Usuario();
            $user->nome = $r->input("nome");
            $user->CPF = $r->input("cpf");
            $user->data_nascimento = $r->input("data");
            $user->email = $r->input("email");
            $user->telefone = $r->input("telefone");
            $user->endereco = $r->input("endereco");
            $user->cidade = $r->input("cidade");
            $user->estado = $r->input("estado");
            $user->CEP = $r->input("cep");
            $user->save();

            return view('cadastrar', [
                  "success"=>true,
                  "link_exit"=>route("index"),
                  "link_lixeira"=>route("trash"),
                  "link_home"=>route("home"),
                  "link_cadastro"=>route("cadastrar"),
                  "link_create"=>route("create")
            ]);
          
      }
      public function getTrash()
      {
          $data = array();
          //pegando todos os usuarios deletados
          $data = Usuario::onlyTrashed()->orderBy("id", "desc")->get();
          
          return view('deletados', [
            "link_lixeira"=>route("trash"),
            "link_exit"=>route("index"),
            "link_home"=>route("home"),
            "link_cadastro"=>route("cadastrar"),
            "deletes"=>$data
          ]);
      }
      public function restaurar($id)
      {
          $user = array();
          //pegar um usuario deletado, pelo id
          $user = Usuario::withTrashed()->find($id);
          if(!empty($user)){
            $user->restore();

            $data = array();
            //pegando todos os usuarios deletados
            $data = Usuario::onlyTrashed()->orderBy("id", "desc")->get();
            
            return view('deletados', [
              "restore"=>true,
              "link_lixeira"=>route("trash"),
              "link_exit"=>route("index"),
              "link_home"=>route("home"),
              "link_cadastro"=>route("cadastrar"),
              "deletes"=>$data
            ]);
          }else{
            return redirect()->route("home");
          }
          
      }
      public function forceDelete($id)
      {
          $user = array();
          //pegar um usuario deletado, pelo id
          $user = Usuario::withTrashed()->find($id);
          if(!empty($user)){
            $user->forceDelete();

            $data = array();
            //pegando todos os usuarios deletados
            $data = Usuario::onlyTrashed()->orderBy("id", "desc")->get();

            return view('deletados', [
              "msg_delete"=>true,
              "link_lixeira"=>route("trash"),
              "link_exit"=>route("index"),
              "link_home"=>route("home"),
              "link_cadastro"=>route("cadastrar"),
              "deletes"=>$data
            ]);
          }else{
            return redirect()->route("home");
            exit;
          }

      }
}