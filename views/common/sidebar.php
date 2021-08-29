<?php 

function sidebar() {
return '
<div class="col-md-2 bg-light d-none d-md-block sidebar">
    <div class="left-sidebar">
        <ul class="nav flex-column sidebar-nav">
            '.listaMenu().'
        </ul>
    </div>
</div>';
}

function listaMenu(){
    $nombre_menu = [
        'inicio' => 'Inicio',
        'usuarios' => 'Usuarios',
        'perfil' => 'Perfil',
    ];

    $menu ='';
    foreach ($nombre_menu as $url => $value) {
        $menu .='
    <li class="nav-item">
        <a class="nav-link active" href="'.BASEPATH.$url.'">
            <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20"
                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z"
                    clip-rule="evenodd" /></svg>
            '.$value.'
        </a>
    </li>';
    }
    return $menu;
}

