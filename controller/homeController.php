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
        $queryDate = "SELECT confirmed_date FROM patientinfo ORDER BY confirmed_date DESC LIMIT 1";


        $result_All = $this->db->executeSelectQuery($queryAll);
        $result_Rec = $this->db->executeSelectQuery($queryRecovered);
        $result_Act = $this->db->executeSelectQuery($queryActive);
        $result_Death = $this->db->executeSelectQuery($queryDeath);
        $result_Date = $this->db->executeSelectQuery($queryDate);

        print_r($result_Date);

        $count = new CountCase($result_All[0]['COUNT(patient_id)'], $result_Rec[0]['COUNT(patient_id)'], $result_Act[0]['COUNT(patient_id)'], $result_Death[0]['COUNT(patient_id)'], $result_Date[0]['confirmed_date']);

        return $count;
    }
}