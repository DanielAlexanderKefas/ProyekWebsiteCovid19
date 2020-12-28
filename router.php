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
        case $baseURL.'/loginAdmin':
            require_once "controller/loginAdminController.php";
            $loginAdminController = new LoginAdminController();
            echo $loginAdminController -> view_loginAdmin();
            break;
    }

} else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch ($url) {
        case $baseURL.'/verify-adm':
            require_once "controller/loginAdminController.php";
            $loginAdminController = new LoginAdminController();
            echo $loginAdminController->loginAdmin();
            break;
    }
}   