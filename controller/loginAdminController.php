<?php

require_once "service/mysqlDB.php";
require_once "service/view.php";
require_once "service/session.php";

class LoginAdminController {
    protected $db;

    public function __construct()
    {
        Session::start();
        $this->db = new MySQLDB("localhost", "root", "","covid_data");
    }


    public function view_loginAdmin() {
        return View::createView('loginAdmin.php', []);
    }

    public function loginAdmin() {
        $username = "";
        $password = "";

        if(isset($_POST['userAdmin']) && isset($_POST['passAdmin']) && $_POST['userAdmin'] != "" && $_POST['passAdmin'] != "") {
            $username = $_POST['userAdmin'];
            $password = $_POST['passAdmin'];

            $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

            $result = $this->db->executeSelectQuery($query);
            if(count($result) > 0) {
                echo "Login Success";
                Session::set('login', 'true');
                return true;
            } else {
                echo "Login Failed";
                Session::set('login', 'false');
                return false;
            }
        }
    }
}