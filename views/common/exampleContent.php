<?php

function main_content(){
    return '   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.bg-purple {
    background-color: #9836a4;
    color: white;
  }  
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h3>Panel principal</h3>
    <hr>
    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-4">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa fa-users fa-2x" aria-hidden="true"></i>
            <hr />
            <p class="card-title lead">Usuarios registrados</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-4">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa fa-edit fa-2x" aria-hidden="true"></i>
            <hr />
            <p class="card-title lead">Perfiles</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-4">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa fa-image fa-2x" aria-hidden="true"></i>
            <hr />
            <p class="card-title lead">otro</p>
          </div>
        </div>
      </a>
    </div>
  </div>
</main>';
}