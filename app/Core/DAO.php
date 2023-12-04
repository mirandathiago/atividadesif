<?php

namespace Atividades\Core;

#Classe abstrata serve como modelo ou de herança para outras classes e não pode ser instanciada diretamente. Classes abstratas também permitem que tenhamos apenas contratos para que sejam implementatos pelas classes que herdem desta.

abstract class DAO
{

    protected static string $tabela = "";
    protected static string $classe = \stdClass::class;

    
 
    public static function inserir(Entity $entidade)
    {
        $db = new Database;
        $tabela = static::$tabela;

        $sql = "INSERT INTO {$tabela}";

        $campos = [];
        $coringas = [];
        $dados = [];
        $propriedades = $entidade->getProps();

        foreach($propriedades as $propriedade => $valor)
        {
            if( !is_null( $entidade->$propriedade ) ){
                array_push($campos,$propriedade);
                array_push($dados,$valor);
                array_push($coringas,'?');
            }
        }


       $campos = implode(',',$campos); 
       $coringas = implode(',',$coringas);
       $sql .= " ({$campos}) VALUES ({$coringas})";

        
     
             
       return $db->execute($sql,$dados);
    }

    
    public static function editar(Entity $entidade)
    {
        $db = new Database;
        $tabela = static::$tabela;
   
        $sql = "UPDATE {$tabela} SET";
        
        $propriedades = $entidade->getProps();
        $dados = [];
        $campos = "";

        foreach($propriedades as $propriedade => $valor)
        {
            if($propriedade != 'id' && !is_null($entidade->$propriedade))
            {
                $campos .= " {$propriedade} = ?,";
                array_push($dados,$valor); 
            }
        }
        
        $campos = rtrim($campos,',');
        $sql .= "{$campos} WHERE id = ?";
        array_push($dados,$entidade->id);

                

        return $db->execute($sql,$dados);

    }

    public static function getAll()
    {

        $db = new Database;
        $tabela = static::$tabela;
        $sql = "SELECT * FROM {$tabela}";
        $db->execute($sql);

        return $db->getAll(static::$classe );


    }

    public static function getById($id)
    {
        $db = new Database;
        $tabela = static::$tabela;
        $sql = "SELECT * FROM {$tabela} WHERE id = ?";
        
        $db->execute($sql,[$id]);

        return $db->get(static::$classe);
    }

    public static function getBy(string $where,...$valores)
    {
        $db = new Database;
        $tabela = static::$tabela;
        $sql = "SELECT * FROM {$tabela} WHERE $where LIMIT 1";
        
        $db->execute($sql,$valores);

        return $db->get(static::$classe);
    }

    public static function excluir(Entity $entidade)
    {
        $db = new Database;
        $tabela = static::$tabela;
        $sql = "DELETE FROM {$tabela} WHERE id = ?";

        return $db->execute($sql,[$entidade->id]);
    }



}