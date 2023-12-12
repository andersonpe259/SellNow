<?php
class BasePath{

    public $basePath;
    function __construct() {
      // Obtém o esquema (http ou https)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

    // Obtém o nome do host
    $host = $_SERVER['HTTP_HOST'];

    // Obtém a porta, se necessário
    $port = $_SERVER['SERVER_PORT'];

    // Constrói o caminho base
    $basePath = "$protocol://$host";


    // Adiciona a barra final
    $basePath .= '/';
    
        $this->basePath = $basePath;
    }
}