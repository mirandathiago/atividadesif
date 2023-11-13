<?php
declare(strict_types= 1);

use Atividades\Core\Router;

require __DIR__ . "/vendor/autoload.php";
require __DIR__. "/app/config.php";
require __DIR__. "/app/rotas.php";
require __DIR__. "/app/Core/helper.php";



$url = $_GET['url'] ?? "";

Router::exec($url);





