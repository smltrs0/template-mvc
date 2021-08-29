<?php

function htmlHeader($title =''){
    // validarSession();
    return '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="./assets/main.css" rel="stylesheet">
        <title>'.$title.'</title>
    </head>
    <body>
    ';
}

function validarSession(){
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_email']) && !isset($_SESSION['user_name'])){
        header('Location: index.php');
        header('Content-type: text/html; charset=iso-8859-1');
    }
}