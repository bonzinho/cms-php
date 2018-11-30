<?php

function setInternalServerError($errno, $errstr, $errfile, $errline) {
    http_response_code(500);
    echo '<h1>Error</h1>';

    if(!DEBUG){
        exit;
    }

    echo "<span style='font-weight: bold; color: red'>";
    switch ($errno){
        case E_USER_ERROR:
            echo "<strong>ERROR</strong> [" . $errno . "] " . $errstr . "<br>\n";
            echo "Fatal Error on line " . $errline . 'in file ' . $errfile;
            break;

        case E_USER_WARNING:
            echo "<strong>WARNING</strong> [" . $errno . "] " . $errstr . "<br>\n";
            echo "Warning Error on line " . $errline . 'in file ' . $errfile;
            break;

        case E_USER_NOTICE:
            echo "<strong>NOTICE</strong> [" . $errno . "] " . $errstr . "<br>\n";
            echo "Notice Error on line " . $errline . 'in file ' . $errfile;
            break;

        default:
            echo "UNKNOW ERROR TYPE [" . $errno . "] " . $errstr . "<br>\n";
            echo "Unknow Error on line " . $errline . 'in file ' . $errfile;
            break;
    }
    echo "</span>";

    echo "<ul>";
    foreach (debug_backtrace() as $error) {
        if(!empty($error['file'])) {
            echo "<li>";
            echo $error['file'] . ':';
            echo $error['line'] . ':';
            echo "</li>";
        }
    }
    echo "</ul>";
    exit;
}

set_error_handler('setInternalServerError');
set_exception_handler('setInternalServerError');