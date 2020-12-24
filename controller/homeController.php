<?php

require_once "service/mysqlDB.php";
require_once "service/view.php";
require_once "service/session.php";
require_once "model/CountCase.php";

class HomeController{
    protected $db;

    public function __construct()
    {
        Session::start();
        $this->db = new MySQLDB("localhost", "root", "","covid_data");
    }

    public function view_home(){
        $count = $this->getCountData();
        if(isset($count)){
            return View::createView('home.php', ["count" => $count]);
        }
    }

    public function getCountData(){
        $queryAll = "SELECT COUNT(patient_id) FROM patientinfo";
        $queryRecovered = "SELECT COUNT(patient_id) FROM patientinfo WHERE state = 'released'";
        $queryActive = "SELECT COUNT(patient_id) FROM patientinfo WHERE state = 'isolated'";
        $queryDeath= "SELECT COUNT(patient_id) FROM patientinfo WHERE state = 'deceased'";

        $result_All = $this->db->executeSelectQuery($queryAll);
        $result_Rec = $this->db->executeSelectQuery($queryRecovered);
        $result_Act = $this->db->executeSelectQuery($queryActive);
        $result_Death = $this->db->executeSelectQuery($queryDeath);

        $count = new CountCase($result_All[0]['COUNT(patient_id)'], $result_Rec[0]['COUNT(patient_id)'], $result_Act[0]['COUNT(patient_id)'], $result_Death[0]['COUNT(patient_id)']);
        return $count;
    }
}