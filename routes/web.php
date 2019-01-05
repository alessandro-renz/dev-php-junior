<?php
//Rota que vai na raiz do projeto
Route::get('/', function(){
	$link = route("home");
	return view("inicio", ["link"=>$link]);
})->name("index");
//Rota que entra na lista de usuarios
Route::get('/users', "UsersController@getUsers")->name("home");
Route::get("/users/cadastrar", function(){
	
	return view('cadastrar', [
			"link_exit"=>route("index"),
   			"link_home"=>route("home"),
   			"link_cadastro"=>route("cadastrar")
   		]);
})->name("cadastrar");
Route::get('/users/{id}/show', "UsersController@getUserById")->where("id","[0-9]{1,}");
Route::get('/users/{id}/{nome}/delete', "UsersController@delete")->where("id","[0-9]{1,}");
Route::get('/users/{id}/edit', "UsersController@update")->where("id","[0-9]{1,}");