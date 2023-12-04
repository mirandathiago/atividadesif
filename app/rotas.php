<?php

use Atividades\Core\Router;

Router::get('/','HomeController','index');
Router::get('/login','LoginController','login');
Router::get('/criarconta','LoginController','criarconta');
Router::post('/cadastrarconta','LoginController','cadastrarconta');
Router::post('/autentica','LoginController','autentica');