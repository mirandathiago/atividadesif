<?php

namespace Atividades\Core;

#Classe abstrata é aquela que não pode ser diretamente instanciada, ela serve como base para outras classes sendo herdada. 
abstract class Controller{

    
    protected function view(string $arquivo,array $dados=[])
    {
        extract($dados); 
        require PASTA_VIEW."{$arquivo}.view.php";
    }



}