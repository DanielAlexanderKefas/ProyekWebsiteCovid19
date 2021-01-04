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
        case $baseURL . '/editAdmin':
            require_once "controller/editAdminController.php";
            $editADminController = new EditAdminController();
            echo $editADminController->view_editadmin();
            break;
        case $baseURL . '/logoutAdmin':
            require_once "controller/loginAdminController.php";
            $loginAdminController = new LoginAdminController();
            $loginAdminController->logoutAdmin();
            header('Location: loginAdmin');
            break;
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch ($url) {
        case $baseURL.'/verify-adm':
            require_once "controller/loginAdminController.php";
            $loginAdminController = new LoginAdminController();
            echo $loginAdminController->loginAdmin();
            header('Location: editAdmin');
            break;
        case $baseURL.'/data-filter':
            require_once "controller/dataController.php";
            $dataController = new DataController();
            echo $dataController -> view_data();
            break;
        case $baseURL . '/input-data':
            require_once "controller/editAdminController.php";
            $editADminController = new EditAdminController();
            echo $editADminController -> addData();
            header('Location: editAdmin');
            break;
    }
}   