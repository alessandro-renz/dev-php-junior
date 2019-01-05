<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuario;

class UsersController extends Controller
{
	private $link_home;
	private $link_cadastro;
	const HOME = "/dev-php-junior/public/users";
	
	public function getUsers()
	{
   		$data = array();
         //pegando todos os usuarios da tabela usuarios
         $data = Usuario::all();

         $this->link_home = route("home");
   		$this->link_cadastro = route("cadastrar");
   		
   		return view('home', [
   			"link_home"=>$this->link_home,
   			"link_cadastro"=>$this->link_cadastro,
   			"users"=>$data
   		]);
	}
	public function getUserById($id)
	{
   		$user = array();
   		if(!isset($id)){
   			redirect(UsersController::HOME);
   			exit;
   		}
   		$user = DB::table("usuarios")->where("id",$id)->first();
   		
   		return view('show_user', [
   			"link_home"=>UsersController::HOME,
   			"link_cadastro"=>$this->link_cadastro,
   			"user"=>$user
   		]);
   	}
   	public function delete($id)
   	{
   		if(empty($id)){
   			redirect()->route("home");
   			exit;
   		}
   		$user = DB::table("usuarios")->where("id", $id)->first();
   		if(!empty($user)){
   			DB::table("usuarios")->where("id",$id)->delete();
   			return view("home", ["msg"=>"Usuário excluido com sucesso!"]);
   		}else{
   			redirect()->route("home");
   			exit;
   		}
   		
   	}
}
