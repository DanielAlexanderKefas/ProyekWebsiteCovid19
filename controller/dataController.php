<?php

require_once "service/mysqlDB.php";
require_once "service/view.php";
require_once "service/session.php";
require_once "model/CountCase.php";
require_once "model/DetailCase.php";
require_once "model/Provinces.php";

class DataController{
    protected $db;

    public function __construct()
    {
        Session::start();
        $this->db = new MySQLDB("localhost", "root", "","covid_data");
    }

    public function view_data(){
		$firstCase = $this -> getFirstDate();
		$provinces = $this -> getProvinces();
		$count = $this -> getCountData();
		
		$filter = $_POST['filter'];
		if (isset($filter)) {
			$province = $_POST['province'];
			$start = $_POST['start-date'];
			$end = $_POST['end-date'];
			
			$cases = $this -> getTimeCasesFiltered($province, $start, $end);
		}
		else $cases = $this -> getTimeCases();
		
        if(isset($count)){
            return View::createView('data.php', [
				"firstCase" => $firstCase,
				"provinces" => $provinces,
				"count" => $count,
				"cases" => $cases
			]);
        }
    }

	public function getFirstDate() {
		$queryFirstDate = "SELECT date FROM timeprovince ORDER BY date ASC LIMIT 1";
		
		$query_result = $this -> db -> executeSelectQuery($queryFirstDate);
		
        return $query_result[0]['date'];
	}
	
	public function getProvinces() {
		$queryCases = "SELECT date, province, SUM(confirmed) as 'confirmed', (SUM(confirmed) - SUM(released) - SUM(deceased)) AS 'active', SUM(deceased) as 'deceased', SUM(released) as 'released' FROM timeprovince GROUP BY province ORDER BY date ASC, province ASC";
		
		$query_result = $this -> db -> executeSelectQuery($queryCases);
		
		$cases = [];
		foreach ($query_result as $key => $result) {
			$cases[] = new DetailCase($result['confirmed'], $result['active'], $result['deceased'], $result['released'], $result['province']);
		}
        return $cases;
	}
	
    public function getCountData(){
        $queryAll = "SELECT SUM(confirmed) AS confirmed, SUM(released) AS released, SUM(deceased) AS deceased FROM `timeprovince`";
        $queryDate = "SELECT date FROM timeprovince ORDER BY date DESC LIMIT 1";



        $result_All = $this->db->executeSelectQuery($queryAll);
        $result_Date = $this->db->executeSelectQuery($queryDate);

        $activeCase = $result_All[0]['confirmed'] - $result_All[0]['deceased'] - $result_All[0]['released'];
        $count = new CountCase($result_All[0]['confirmed'], $result_All[0]['released'], $activeCase, $result_All[0]['deceased'], $result_Date[0]['date']);


        return $count;
    }
	
	public function getTimeCases() {
		$queryCases = "SELECT date, province, SUM(confirmed) as 'confirmed', (SUM(confirmed) - SUM(released) - SUM(deceased)) AS 'active', SUM(deceased) as 'deceased', SUM(released) as 'released' FROM timeprovince GROUP BY province ORDER BY date ASC, province ASC";
		
		$query_result = $this -> db -> executeSelectQuery($queryCases);
		
		$cases = [];
		foreach ($query_result as $key => $result) {
			$cases[] = new DetailCase($result['confirmed'], $result['active'], $result['deceased'], $result['released'], $result['province']);
		}
        return $cases;
	}
	
	public function getTimeCasesFiltered($province, $start, $end) {
		$queryCases = "SELECT date, province, SUM(confirmed) as 'confirmed', (SUM(confirmed) - SUM(released) - SUM(deceased)) AS 'active', SUM(deceased) as 'deceased', SUM(released) as 'released' FROM timeprovince WHERE province = '$province' AND date BETWEEN '$start' AND '$end' GROUP BY province ORDER BY date ASC, province ASC";
		
		$query_result = $this -> db -> executeSelectQuery($queryCases);
		
		$cases = [];
		foreach ($query_result as $key => $result) {
			$cases[] = new DetailCase($result['confirmed'], $result['active'], $result['deceased'], $result['released'], $result['province']);
		}
        return $cases;
	}
}