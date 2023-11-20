<?php

namespace Atividades\Controllers;

use Atividades\Core\Controller;
use Atividades\Models\DAO\UsuariosDAO;
use Atividades\Models\Entities\Usuario;


class HomeController extends Controller{


    public function index()
    {
        $dados = ['titulo' => 'Atividades IFBA 2023'];
        $this->view('inicial',$dados);
    }

   



}