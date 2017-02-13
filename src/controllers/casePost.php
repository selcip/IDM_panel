<?php
session_start();
if(!isset($_POST)){
    echo "sai daqui";
    die();
}

if(isset($_POST['action'])){
    include("../models/class.user.php");
    include("../models/class.player.php");
    $user = new User();
    $player = new Player();
    $case = $_POST['action'];
    switch($case){
        case "login_form":
            $user->login();       
            break;
        case "espiar":
            $player->espiar();
            break;
        case "log_levelup":
            $player->logLevelup();
            break;
        case "log_boss":
            $player->logBossKilled();
            break;
        case "mainLog_boss":
            $player->getLastBossesKilled();
            break;
        default:
            echo 2;
            break;
    }
}