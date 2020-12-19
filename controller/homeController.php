<?php

require_once "service/view.php";

class HomeController{
    public function view_home(){
        return View::createView('home.php', []);
    }
}