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

    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch ($url) {

    }
}   