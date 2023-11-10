<?php

namespace Atividades\Controllers;

use Atividades\Core\Controller;

class ErroController extends Controller{

   public function erro404()
   {
     $this->view('404');
   }

}