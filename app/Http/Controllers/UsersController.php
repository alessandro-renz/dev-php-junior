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
         //links de direcionamento
         $this->link_home = route("home");
   		   $this->link_cadastro = route("cadastrar");
         $this->link_exit = route("index");
   		
   		return view('home', [
        "link_exit"=>route("index"),
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
   		
   		return view('show_user', [
            "link_delete"=>"/dev-php-junior/public/users/$user->id/$user->nome/delete",
            "link_edit"=>"/dev-php-junior/public/users/$user->id/edit",
            "link_exit"=>route("index"),
   			"link_home"=>route("home"),
   			"link_cadastro"=>route("cadastrar"),
   			"user"=>$user
   		]);
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
      public function update($id){
        if(empty($id) || !isset($id)){
            return redirect()->route("home");
            exit;
         }else{
           $user = Usuario::find($id);
           if(!empty($user)){
               return view('user_edit', [
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
                  "link_cadastro"=>route("cadastrar")
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
}
