<?php

namespace Atividades\Models\Entities;

use Atividades\Core\Entity;

class Usuario extends Entity{

    protected ?int $id;
    protected ?string $nome;
    protected ?string $email;
    protected ?string $login;
    protected ?string $senha;
    protected ?string $foto;
    protected ?int $tipo;
    protected ?int $turmas_id; 
    
    

    public function setSenha($valor)
    {
        $this->senha = password_hash($valor,PASSWORD_DEFAULT);
    }

    
    

}