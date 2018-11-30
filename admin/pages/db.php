<?php

function pages_get_data($redirectOnError){
    $title = filter_input(INPUT_POST, 'title');
    $url = filter_input(INPUT_POST, 'url');
    $body = filter_input(INPUT_POST, 'body');

    if(is_null($title) or is_null($url)){
        flash('Informar os campos de título e url', 'error');
        header('location: ' . $redirectOnError);  // enviar par a página anterior
        die();
    }

    return compact('title', 'body', 'url');
}

// Funções anonimas
$pages_all = function () use($conn){
  // Buscar todas as páginas;
    $result = $conn->query('SELECT * FROM pages');
    return $result->fetch_all(MYSQLI_ASSOC);
};

$pages_one = function($id){
    // Busca uma unica páginas
};

$pages_create = function () use($conn){
    // Cria uma nova página
    $data = pages_get_data('/admin/pages/create');

    $sql = 'INSERT INTO pages (title, body, url, updated, created) VALUES (?, ?, ?, NOW(), NOW())';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $data['title'], $data['body'], $data['url']);

    flash('Página criada com sucesso', 'success');

    return $stmt->execute();
};

$pages_edit = function ($id){
    // Edita uma página
    flash('Página editada com sucesso', 'success');
};

$pages_delete = function ($id){
    // Remove uma página
    flash('Página apagada com sucesso', 'success');
};
