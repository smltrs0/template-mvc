<?php
namespace Models;

use PDO;

class Coneccion{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $coneccion;

    public function __construct(){
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->db = "template_crud_mvc";
        $this->conectar();
    }

    public function conectar(){
        // Coneccion a la base de datos PDO
        $this->coneccion = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->user, $this->pass);
        $this->coneccion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->coneccion;
    }

}