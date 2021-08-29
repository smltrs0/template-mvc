<?php
namespace Models;

class Session{
    public static function setUsuario($usuario){
        $_SESSION['username'] = $usuario['username'];
        $_SESSION['nombre'] = $usuario['first_name'];
        $_SESSION['apellido'] = $usuario['last_name'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['perfil_id'] = $usuario['perfil_id'];
        // $_SESSION['perfil'] = $usuario['perfil'];
        // $_SESSION['imagen'] = $usuario['imagen'];
    }

    public static function getUsuario(){
        return [
            'id' => $_SESSION['id'],
            'username' => $_SESSION['username'],
            'nombre' => $_SESSION['nombre'],
            'apellido' => $_SESSION['apellido'],
            'email' => $_SESSION['email'],
            'perfil_id' => $_SESSION['perfil_id'],

        ];
    }

}