<?php

namespace Atividades\Core;

class Validator
{
    protected static bool $houveerro = false;
    protected static array $msg = [];

    public static function execute(array $regrasValidacao, array $valores)
    {
        foreach($regrasValidacao as $campo => $regras)
        {
            $listaregras = explode("|",$regras);
            $valor = $valores[$campo] ?? null;
            $parametros = [$valor,$campo];

            foreach($listaregras as $regra){

                if(strpos($regra,':')){
                    $pedacos = explode(':',$regra);
                    $regra = $pedacos[0];
                    $parametros[] = $pedacos[1];
                }
               
                if(method_exists(__CLASS__,$regra)){
                    call_user_func_array([__CLASS__,$regra],$parametros);
                }

            }

        }
        
        return static::$houveerro;
    }


    public static function getErros():array
    {
        return static::$msg;
    }

    public static function getListaErros():string
    {
        $lista = "";
        foreach(Validator::getErros() as $erro)
        {
            $lista .= "<li>{$erro}</li>";
        }
        return $lista;
    }


    #==================================================================
    #Métodos de Validação

    protected static function obrigatorio($valor,$nomecampo)
    {
       
        $valor = trim($valor);
        if(strlen($valor) == 0){
            static::$houveerro = true;
            static::$msg[$nomecampo] = "O campo {$nomecampo} é obrigatório e não foi preenchido";
        }

    }

    protected static function email($valor,$nomecampo)
    {
       
        if(! filter_var($valor,FILTER_VALIDATE_EMAIL))
        {
            static::$houveerro = true;
            static::$msg[$nomecampo] = "O campo {$nomecampo} precisa ser um email válido";
        }
    }

    protected static function maiorque($valor,$nomecampo,$quantidade)
    {
        $valor = trim($valor);
        if(strlen($valor) <= $quantidade){
            static::$houveerro = true;
            static::$msg[$nomecampo] = "O campo {$nomecampo} precisa ter mais de {$quantidade} caracteres";
        }
    }



}