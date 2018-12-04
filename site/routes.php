<?php

require __DIR__ . '/../admin/pages/db.php';

if (resolve('/contactos')){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $from = filter_input(INPUT_POST, 'from');
        $subject = filter_input(INPUT_POST, 'subject');
        $message = filter_input(INPUT_POST, 'message');
        $headers = 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . '\r\n' .
            'X-Mailer: PHP/' . phpversion(); // fonta de desparo de email

        if(mail('bonzinho@fe.up.pt', $subject, $message, $headers)) {
            flash('Email enviado com sucesso', 'success');
        } else {
            flash('Email não enviado, tente novamente', 'error');
        }

        return header('location: /contactos');
    }

    $pages = $pages_all();
    render('site/contactos', 'site', compact('pages'));
} elseif ($params = resolve('/(.*)')){
    $pages = $pages_all();

    foreach ($pages as $page){
        if($page['url'] == $params[1]){
            break; // para a execfução do foreach
        }
    }

    render('site/page', 'site', compact('pages', 'page'));
}