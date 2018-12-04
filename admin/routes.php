<?php

if (resolve('/admin')){
    render('admin/home', 'admin');
}elseif (resolve('/admin/auth.*')) {
    include __DIR__ . '/auth/routes.php';
}elseif (resolve('/admin/pages.*')) {
    include __DIR__ . '/pages/routes.php';
}elseif (resolve('/admin/users.*')){
    include  __DIR__ . '/users/routes.php';
}elseif (resolve('/admin/upload/image')){
    $file = $_FILES['file'] ?? null;
    if(!$file){
        http_response_code(422);
        echo 'Array de ficheiros vazio';
    }

    $allowedTypes = [
        'image/gif',
        'image/jpg',
        'image/jpeg',
        'image/png',
    ];

    if(!in_array($file['type'], $allowedTypes)){
        http_response_code(422);
        echo 'Tipo de ficheiro inválido';
        exit;
    }

    $name = uniqid(rand(), true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION); // Ficheiro com a extenção correta

    //Guardar ficheiro
    move_uploaded_file($file['tmp_name'], __DIR__ . '/../public/images/' . $name);

    echo '/images/' . $name;


}else{
    http_response_code(404);
    render('admin/notfound', 'admin');
    echo '404 - Not Found';
}