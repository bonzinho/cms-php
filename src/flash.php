<?php

function flash($message = null, $type =null) {
   if ($message) {
       // guardo a mesnagem
       $_SESSION['flash'][] = compact('message', 'type');
   } else {
       // mostra a mensagem
       $flash = $_SESSION['flash'] ?? [];
       if (!count($flash)) {
           return;
       }

       foreach ($flash as $key => $message) {
           render('flash', 'ajax', $message); //  Printar a mensagem da sessao
           unset($_SESSION['flash'][$key]); // remover a mesagem
       }
   }
}