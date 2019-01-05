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
}
