<?php

require_once "service/mysqlDB.php";
require_once "service/view.php";
require_once "service/session.php";
require_once "model/CountCase.php";
require_once "model/DetailCase.php";
require_once "model/FilteredCase.php";
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
			
			$filteredcases = $this -> getTimeCasesFiltered($province, $start, $end);
			$provincetotal = $this -> getProvinceCasesFiltered($province, $start, $end);
		}
		else $cases = $this -> getTimeCases();
		
        if(isset($count)){
			if (isset($filter)) {
				return View::createView('data.php', [
					"firstCase" => $firstCase,
					"provinces" => $provinces,
					"count" => $count,
					"cases" => $filteredcases,
					"provincetotal" => $provincetotal,
					"filter" => $filter,
					"province" => $province,
					"start" => $start,
					"end" => $end
				]);
			}
			else {
				return View::createView('data.php', [
					"firstCase" => $firstCase,
					"provinces" => $provinces,
					"count" => $count,
					"cases" => $cases,
					"filter" => $filter
				]);
			}
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
	
	public function getTimeCases() {
		$queryCases = "SELECT SUM(a.confirmed) AS confirmed, SUM(a.released) AS released, (SUM(a.confirmed) - SUM(a.deceased) - SUM(a.released)) AS active, SUM(a.deceased) AS deceased, a.province
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
            GROUP BY t.province, max_date ) a
		GROUP BY province ORDER BY province ASC";
		
		$query_result = $this -> db -> executeSelectQuery($queryCases);
		
		$cases = [];
		foreach ($query_result as $key => $result) {
			$cases[] = new DetailCase($result['confirmed'], $result['released'], $result['active'], $result['deceased'], $result['province']);
		}
        return $cases;
	}
	
	public function getTimeCasesFiltered($province, $start, $end) {
		$queryCases = "SELECT confirmed, released, (confirmed - deceased - released) AS active, deceased, date FROM `timeprovince` WHERE province = '$province' AND date BETWEEN '$start' AND '$end' ORDER BY date ASC";
		
		$query_result = $this -> db -> executeSelectQuery($queryCases);
		
		$cases = [];
		foreach ($query_result as $key => $result) {
			$cases[] = new FilteredCase($result['confirmed'], $result['released'], $result['active'], $result['deceased'], $result['date']);
		}
        return $cases;
	}
	
	public function getProvinceCasesFiltered($province, $start, $end) {
		$queryCases = "SELECT MAX(confirmed) AS confirmed, MAX(released) AS released, (MAX(confirmed) - MAX(deceased) - MAX(released)) AS active, MAX(deceased) AS deceased, province FROM `timeprovince` WHERE province = '$province' AND date BETWEEN '$start' AND '$end'";
		
		$query_result = $this -> db -> executeSelectQuery($queryCases);
		
		$cases = new DetailCase($query_result[0]['confirmed'], $query_result[0]['released'], $query_result[0]['active'], $query_result[0]['deceased'], $query_result[0]['province']);
		
        return $cases;
	}
}