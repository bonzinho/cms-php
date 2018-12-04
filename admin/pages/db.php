<?php

function pages_get_data($redirectOnError){
    $title = filter_input(INPUT_POST, 'title');
    $url = filter_input(INPUT_POST, 'url');
    $body = filter_input(INPUT_POST, 'body');

    if(!$title){
        flash('Adicione um titulo', 'error');
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

$pages_one = function($id) use($conn){
    // Busca uma unica páginas
    $sql = 'SELECT * FROM pages WHERE id=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();

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

$pages_edit = function ($id) use($conn){
    // Edita uma página
    $data = pages_get_data('/admin/pages/' . $id . '/edit');

    $sql = 'UPDATE  pages SET  title=?, body=?, url=?, updated=NOW() WHERE id=?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $data['title'], $data['body'], $data['url'], $id);

    flash('Página editada com sucesso', 'success');

    return $stmt->execute();

};

$pages_delete = function ($id) use($conn){
    // Remove uma página

    // $data = pages_get_data('/admin/pages/delete');

    $sql = 'DELETE FROM pages WHERE id=?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    flash('Página apagada com sucesso', 'success');

    return $stmt->execute();
};

