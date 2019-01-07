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
      $data = Usuario::all();
         
   		
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
   		if(!isset($id)){
   			return redirect()->route("home");
   			exit;
   		}
   		$user = Usuario::where("id", $id)->first();
   		if(!empty($user)){
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
            "link_delete"=>"/dev-php-junior/public/users/$user->id/$user->nome/delete",
            "link_edit"=>"/dev-php-junior/public/users/$user->id/edit",
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
   		if(empty($id) || !isset($id)){
            return redirect()->route("home");
            exit;
         }else{
           $user = Usuario::find($id);
           if($user->id == $id && $user->nome == $nome){
               $user->delete();
               return redirect()->route("home");
               exit;
           } 
         }

      }
      public function edit($id){
        if(empty($id) || !isset($id)){
            return redirect()->route("home");
            exit;
         }else{
           $user = Usuario::find($id);
           if(!empty($user)){
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
           }else{
               return redirect()->route("home");
           }
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
              if(isset($id)){
                
                //puxando os dados do usuario pelo id no banco de dados
                $user = Usuario::find($id);
                if(!empty($user)){

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
                  return redirect("/users/$user->id/show");
                }else{
                  return redirect()->route("home");
                }
              }else{
                return redirect()->route("home");
              }
      }

      public function create(Request $r)
      {
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
          return redirect()->route("home");
      }
      public function getTrash()
      {
          $data = array();
          //pegando todos os usuarios deletados
          $data = Usuario::onlyTrashed()->get();
          //links de direcionamento
          
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
          }else{
            return redirect()->route("home");
          }
          return redirect()->route("trash");
          
      }
      public function forceDelete($id)
      {
          $user = array();
          //pegar um usuario deletado, pelo id
          $user = Usuario::withTrashed()->find($id);
          if(!empty($user)){
            $user->forceDelete();
          }else{
            return redirect()->route("home");
          }
          return redirect()->route("trash");
      }
}