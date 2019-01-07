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
			"link_lixeira"=>route("trash"),
   			"link_home"=>route("home"),
   			"link_cadastro"=>route("cadastrar"),
   			"link_create"=>route("create")
   	]);
})->name("cadastrar");
Route::get('/users/{id}/show', "UsersController@getUserById")->where("id","[0-9]{1,}");
Route::get('/users/{id}/{nome}/delete', "UsersController@delete")->where("id","[0-9]{1,}");
Route::get('/users/{id}/edit', "UsersController@edit")->where("id","[0-9]{1,}");
Route::post('/users/getCEP', "UsersController@getCEP");
Route::post('/users/{id}/update', "UsersController@update")->where("id","[0-9]{1,}");
Route::post('/users/create', "UsersController@create")->name("create");
Route::get('/users/deletados', "UsersController@getTrash")->name("trash");
Route::get('/users/{id}/force_delete', "UsersController@forceDelete");
Route::get('/users/{id}/restaurar', "UsersController@restaurar");