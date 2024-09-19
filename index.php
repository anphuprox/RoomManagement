<?php

session_start();
require_once './Commons/env.php';
require_once './Commons/helper.php';
require_once './Commons/connect-db.php';
require_once './Commons/database.php';

global $db;

require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);
require_file(PATH_MODEL_ADMIN);
require_file(PATH_CONTROLLER_ADMIN);
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch($action){
case'index':
    $controller = new MainpageController($db);
    $controller->index();
    break;
break;
case 'login':
    $controller = new LoginController();
    $controller->index();
    break;
    case 'logout':
        $controller = new LoginController();
        $controller->logout();
        break;
    case 'dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;
    case'adminDashBoard':
        $controller = new AdminDashboardController();
        $controller->index();
        break;
    case'SearchingEmptyRoom':
        $controller= new SearchingEmptyRoomController();
        $controller->index();
        break;
default:
header('Location: index.php');
    break;

}
require_once './Commons/disconnet-db.php'; 
