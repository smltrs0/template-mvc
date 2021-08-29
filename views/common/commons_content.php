<?php
include './views/common/scrips.php';
include './views/common/sidebar.php';
include './views/common/exampleContent.php';
include './views/common/assets.php';
include './views/common/navbar.php';

function get_header() {
echo htmlHeader().
    navbar().'
    <div class="container-fluid">
        <div class="row">'
        .sidebar()
        .main_content()
        .get_scripts();
}


function head($title = ''){
    echo htmlHeader($title).
    navbar().'
    <div class="container-fluid">
        <div class="row">'
        .sidebar();
}



function footer(){
    echo get_scripts();
}