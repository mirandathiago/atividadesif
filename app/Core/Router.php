<?php

namespace Atividades\Core;

class Router{

    #Metodos e Propriedades Estáticas (static) são aqueles que não pertecem aos objetos instanciados de uma classe mas sim a propria classe e podem ser instanciados diretamente pela classe.

    protected static array $rotas = []; 

    public static function add(string $rota, string $controller, string $acao)
    {
       static::$rotas[$rota] = [$controller,$acao];
    }

    public static function exec(string $url)
    {
        $url = "/".$url;
        $rotas = static::$rotas;

        if( array_key_exists($url,$rotas) ){
            [$controller,$metodo] = $rotas[$url];
        }else{
            [$controller,$metodo] = $rotas['__erro'];   
        }
        
        static::carregarController($controller,$metodo);
    }


    protected static function carregarController($controller,$metodo)
    {
        $controller = NS_CONTROLLERS . $controller;
        $ctr = new $controller();
        $ctr->$metodo();
    }


}