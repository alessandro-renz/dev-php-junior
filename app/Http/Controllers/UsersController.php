<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
	private $link_home;
	private $link_cadastro;

	public function getUsers()
	{
   		$this->link_home = route("home");
   		$this->link_cadastro = route("cadastrar");
   		$data = DB::table("usuarios")->get();
   		return view('home', [
   			"link_home"=>$this->link_home,
   			"link_cadastro"=>$this->link_cadastro,
   			"users"=>$data
   		]);
	}
	public function getUserById($id)
	{
   		return view('show_user', [
   			"link_home"=>$this->link_home,
   			"link_cadastro"=>$this->link_cadastro
   		]);
   	}
}
