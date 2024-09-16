<?php
//require file 
session_start();
require_once './Commons/env.php';
require_once './Commons/helper.php';
require_once './Commons/connect-db.php';
require_once './Commons/database.php';

global $db;

require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch($action){
case'index':
    $controller = new MainpageController($db);
    $controller->index();
    break;
break;

default:
header('Location: index.php');
    break;

}
require_once './Commons/disconnet-db.php'; 
