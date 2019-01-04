<?php
//Rota que vai na raiz do projeto
Route::get('/users', "UsersController@getUsers")->name("home");
Route::get("/users/cadastrar", function(){
	//definindo os links para as rotas home e cadastrar
	$link_home = route("home");
   	$link_cadastro = route("cadastrar");
	return view('cadastrar', [
   			"link_home"=>$link_home,
   			"link_cadastro"=>$link_cadastro
   		]);
})->name("cadastrar");
Route::get('/users/show/{id}', "UsersController@getUserById");
Route::post('/users/delete/{id}', "UsersController@delete")->name("delete");