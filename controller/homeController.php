<?php

require_once "service/mysqlDB.php";
require_once "service/view.php";
require_once "service/session.php";
require_once "model/CountCase.php";

class HomeController
{
    protected $db;

    public function __construct()
    {
        Session::start();
        $this->db = new MySQLDB("localhost", "root", "", "covid_data");
    }

    public function view_home()
    {
        $count = $this->getCountData();
        if (isset($count)) {
            return View::createView('home.php', ["count" => $count]);
        }
    }

    public function getCountData()
    {
        $queryAll = "SELECT SUM(confirmed) AS confirmed, SUM(released) AS released, SUM(deceased) AS deceased FROM `timeprovince`";
        $queryDate = "SELECT date FROM timeprovince ORDER BY date DESC LIMIT 1";



        $result_All = $this->db->executeSelectQuery($queryAll);
        $result_Date = $this->db->executeSelectQuery($queryDate);

        $activeCase = $result_All[0]['confirmed'] - $result_All[0]['deceased'] - $result_All[0]['released'];
        $count = new CountCase($result_All[0]['confirmed'], $result_All[0]['released'], $activeCase, $result_All[0]['deceased'], $result_Date[0]['date']);


        return $count;
    }
}
