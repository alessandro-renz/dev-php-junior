<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
   public function getUsers()
   {
   		$link_home = route("home");
   		$link_cadastro = route("cadastrar");
   		return view('home', [
   			"link_home"=>$link_home,
   			"link_cadastro"=>$link_cadastro
   		]);
   }
   public function getUserById($id)
   {
   		return view('show_user', [
   			"link_home"=>$link_home,
   			"link_cadastro"=>$link_cadastro
   		]);
   }
}
