<?php
declare(strict_types= 1);

use Atividades\Core\Router;

require __DIR__ . "/vendor/autoload.php";

const PASTA_VIEW = "./app/Views/";
const NS_CONTROLLERS = "\\Atividades\\Controllers\\";


$url = $_GET['url'] ?? "";

Router::add('/','HomeController','index');
Router::add('/login','LoginController','login');
Router::add('/cadastro','LoginController','criarconta');
Router::add('__erro','ErroController','erro404');

Router::exec($url);





