<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = date("Y/m/d", time());
        DB::table("usuarios")->insert([
        	"nome"=>"Jorge",
        	"CPF"=>"01299874788",
        	"data_nascimento"=>$data,
        	"email"=>"email@email.com",
        	"telefone"=>"5491520765",
        	"endereco"=>"Rua xxx, 987",
        	"cidade"=>"Passo fundo",
        	"estado"=>"RS"

        ]);
        DB::table("usuarios")->insert([
            "nome"=>"Carlos",
            "CPF"=>"01299874788",
            "data_nascimento"=>$data,
            "email"=>"email@email.com",
            "telefone"=>"5491520765",
            "endereco"=>"Rua xxx, 987",
            "cidade"=>"São Paulo",
            "estado"=>"SP"

        ]);
        DB::table("usuarios")->insert([
            "nome"=>"Miguel",
            "CPF"=>"01299874788",
            "data_nascimento"=>$data,
            "email"=>"email@email.com",
            "telefone"=>"5491520765",
            "endereco"=>"Rua xxx, 987",
            "cidade"=>"Erechim",
            "estado"=>"RS"

        ]);
        DB::table("usuarios")->insert([
            "nome"=>"Antonio",
            "CPF"=>"01299874788",
            "data_nascimento"=>$data,
            "email"=>"email@email.com",
            "telefone"=>"5491520765",
            "endereco"=>"Rua xxx, 987",
            "cidade"=>"Novo Hamburgo",
            "estado"=>"RS"

        ]);
    }
}
