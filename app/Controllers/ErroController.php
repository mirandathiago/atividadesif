<?php

namespace Atividades\Controllers;

use Atividades\Core\Controller;

class ErroController extends Controller{

   public function erro($tipo)
   {
     
    switch($tipo){
      case "404":
        $this->view('404');
      break;
      case "controller":
        $this->view('erro',['msg' => 'Erro! Controller Não Existe']);
      break;
      case "metodo":
        $this->view('erro',['msg' => 'Erro! O Método não existe no Controlador']);
    }



    
   }

   

}