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
        $queryAll = "SELECT SUM(a.confirmed) AS confirmed, SUM(a.released) AS released, SUM(a.deceased) AS deceased, a.max_date
        FROM (
            SELECT
              t.province,
              SUM(confirmed) AS confirmed, SUM(released) AS released, SUM(deceased) AS deceased,
              max_date
            FROM
              `timeprovince` t
              JOIN (
                SELECT 
                  province,
                  MAX(date) AS max_date
                FROM `timeprovince`
                GROUP BY province
              ) name_dates
                ON t.province = name_dates.province AND t.date = max_date
            GROUP BY t.province, max_date ) a";



        $result_All = $this->db->executeSelectQuery($queryAll);

        $activeCase = $result_All[0]['confirmed'] - $result_All[0]['deceased'] - $result_All[0]['released'];
        $count = new CountCase($result_All[0]['confirmed'], $result_All[0]['released'], $activeCase, $result_All[0]['deceased'], $result_All[0]['max_date']);


        return $count;
    }
}
