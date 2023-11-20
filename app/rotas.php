<?php

use Atividades\Core\Router;

Router::add('/','HomeController','index');
Router::add('/login','LoginController','login');
Router::add('/cadastro','LoginController','criarconta');