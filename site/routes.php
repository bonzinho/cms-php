<?php

if (resolve('/')){
    render('site/home', 'site');
} elseif (resolve('/contactos')){
    render('site/contactos', 'site');
}else{
    http_response_code(404);
    echo '404 - Not Found';
}