<?php

namespace Atividades\Controllers;

use Atividades\Core\Controller;
use Atividades\Models\DAO\UsuariosDAO;
use Atividades\Models\Entities\Usuario;

class TesteController extends Controller
{
    public function teste()
    {
        $usuario = new Usuario();
        $usuario->nome = "Mariana";
        $usuario->email = "mariana@ifba.edu.br";
        $usuario->login = 'mariana';
        $usuario->senha = '123456';
        $usuario->tipo = 1;
        $usuario->turmas_id = 1;

       
        UsuariosDAO::inserir( $usuario );


    }

    public function teste2()
    {

      
        $usuarios = UsuariosDAO::getAll();

        foreach($usuarios as $usuario){
            echo $usuario->nome;
            echo " - " .  $usuario->senha;
            echo "<hr>";
        }

    }

    public function teste3()
    {
       
        $usuario = UsuariosDAO::getById(26);
        echo "<pre>";
        var_dump($usuario);
    }

    
    public function teste4()
    {
        
        $usuario = UsuariosDAO::getById(29);
      
        $usuario->nome = "Laura da Silva";
        $usuario->email = "laura@ifba.edu.br";
        $usuario->login = "laura";
  

        UsuariosDAO::editar($usuario);

        echo "<pre>";
        var_dump($usuario);

    }

    public function teste5()
    {
        
        $usuario = UsuariosDAO::getById(24);
      
       if($usuario){
        UsuariosDAO::excluir($usuario);
        echo "Usuário Excluído com Sucesso!";
       }else{
        echo "Usuário não existe";
       }

    }

    public function teste6()
    {
        $usuario = new Usuario(
            [
                'nome' => 'Julia',
                'email' => 'julia@ifba.edu.br',
                'login' => 'julia',
                'senha' => 1234,
                'tipo' => 1,
                'turmas_id' => 1
            ]
        );

       
       echo "<pre>";
       var_dump($usuario->getProps());


    }
}
