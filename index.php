<?php
include "./views/common/commons_content.php";
include "./vendor/autoload.php";
// Use this namespace

use Config\Database;
use Steampixel\Route;

define('BASEPATH','/');
new Database();

Route::add('/', function() {
    include "./views/pagina-pincipal.php";
});

Route::add('/panel-principal', function() {
  head('Panel principal');
  echo main_content();
  footer();
});

Route::add('/inicio', function(){
  head();
  echo '<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">main contenido</main>';
  footer();
});

Route::add('/perfil', function(){
  head();
  include "./views/Users/Profile.php";
  footer();
});

Route::add('/usuarios', function(){
  head('Lista de usuarios');
  include "./views/Users/userList.php";
  footer();
});


Route::add('/login', function(){
  include "./views/Login/Login.php";
});

Route::add('/crear-cuenta', function(){
  include "./views/Login/Register.php";
});

Route::run(BASEPATH);
