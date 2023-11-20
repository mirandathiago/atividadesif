<?php

namespace Atividades\Models\DAO;

use Atividades\Core\DAO;
use Atividades\Models\Entities\Usuario;

class UsuariosDAO extends DAO
{

    protected static string $tabela = "usuarios";
    protected static string $classe = Usuario::class;
    

}