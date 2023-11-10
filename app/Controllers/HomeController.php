<?php

namespace Atividades\Controllers;

use Atividades\Core\Controller;

class HomeController extends Controller{


    public function index()
    {
        $dados = ['titulo' => 'Atividades IFBA 2023'];
        $this->view('inicial',$dados);
    }

}