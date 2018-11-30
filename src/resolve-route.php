<?php

function resolve($route) {
    $path = $_SERVER['PATH_INFO'] ?? '/'; // Se estiver vazio retorna / se não retorna o que esta no path_info

    $route = '/^'. str_replace('/', '\/', $route) .'$/';

    if(preg_match($route, $path, $params)){
        return $params;
    }

    return false;
}