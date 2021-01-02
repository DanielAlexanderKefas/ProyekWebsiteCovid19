<?php

$url = $_SERVER['REDIRECT_URL'];
$baseURL = '/ProyekWebsite';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    switch($url){
        case $baseURL.'/home':
            require_once "controller/homeController.php";
            $homeController = new HomeController();
            echo $homeController -> view_home();
            break;
		case $baseURL.'/data':
            require_once "controller/dataController.php";
            $dataController = new DataController();
            echo $dataController -> view_data();
            break;
        case $baseURL.'/loginAdmin':
            require_once "controller/loginAdminController.php";
            $loginAdminController = new LoginAdminController();
            echo $loginAdminController -> view_loginAdmin();
            break;
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch ($url) {
        case $baseURL.'/verify-adm':
            require_once "controller/loginAdminController.php";
            $loginAdminController = new LoginAdminController();
            echo $loginAdminController->loginAdmin();
            break;
		    case $baseURL.'/data-filter':
            require_once "controller/dataController.php";
            $dataController = new DataController();
            echo $dataController -> view_data();
            break;

    }
}   