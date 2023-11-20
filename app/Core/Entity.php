<?php

namespace Atividades\Core;


abstract class Entity{

    public function __construct(array $dados = [])
    {
        if(empty($dados))
        {
            return;
        }
        $propriedades = get_class_vars( get_called_class() );
        foreach( array_keys($propriedades) as $propriedade )
        {
           if( array_key_exists($propriedade,$dados) )
           {
                $metodo = "set".ucfirst($propriedade);
                if(method_exists($this,$metodo))
                {
                    $this->$metodo($dados[$propriedade]);                    
                }else{
                    $this->$propriedade = $dados[$propriedade];
                }
              
           }else{
               if(!isset($this->$propriedade)){
                  $this->$propriedade = NULL;
               }
           }
        }
        
    }
   
    public function __set($nomeProp,$valor)
    {
        $metodo = "set".ucfirst($nomeProp);
        if(method_exists($this,$metodo))
        {
            $this->$metodo($valor);
            return;
        }
        
        if(property_exists($this,$nomeProp)){
            $this->$nomeProp = $valor;
        }
    }

    public function __get($nomeProp)
    {
        $metodo = "get".ucfirst($nomeProp);
        if(method_exists($this,$metodo))
        {
            return $this->$metodo();            
        }
        if(property_exists($this,$nomeProp)){
            return $this->$nomeProp;
        }
    }

    public function getProps()
    {
        return  get_object_vars($this);
    }


}

