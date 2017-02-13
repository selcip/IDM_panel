<?php
session_start();
$pagina = filter_input(INPUT_GET,'p');
$pagina = $pagina ?: 'index';
$pagina = 'src/views/' . $pagina . '.php';

if(!file_exists($pagina)) exec_404();
require_once 'src/models/class.player.php';
require_once 'src/models/class.user.php';
$user = new User();
$player = new Player();
require_once("public/common/header.php");
require_once $pagina;
require_once("public/common/scripts.php");

function exec_404(){
    echo 'n tem';
}
