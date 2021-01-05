<?php

require_once "service/mysqlDB.php";
require_once "service/view.php";
require_once "service/session.php";
require_once "model/TimeProvince.php";
require_once "model/Provinces.php";

class EditAdminController
{
    protected $db;
    protected $jumlahHalaman;
    protected $halamanAktif;
    protected $halamanSebelum;
    protected $halamanSesudah;

    public function __construct(){
        Session::start();
        $this->db = new MySQLDB("localhost", "root", "", "covid_data");
    }


    public function view_editadmin(){
        if(isset($_SESSION["login"])){
            if($_SESSION["login"] == true){
                $timeProvinces = $this->getTimeProvince();
                $provinces = $this->getProvinces();
                $firstCase = $this->getFirstDate();

                $page = $this->getJumlahHalaman();
                $activePage = $this->getHalamanAktif();
                $previousPage = $this->getHalamanSebelum();
                $nextPage = $this->getHalamanSesudah();
                return View::createView('editAdmin.php', [
                    "timeProvinces" => $timeProvinces,
                    "provinces" => $provinces,
                    "firstCase" => $firstCase,
                    "page" => $page,
                    "activePage" => $activePage,
                    "previousPage" => $previousPage,
                    "nextPage" => $nextPage
                ]);
            }
        }
        else{
            header('Location: loginAdmin');
        }
    }

    public function getJumlahHalaman(){
        return $this->jumlahHalaman;
    }

    public function getHalamanAktif(){
        return $this->halamanAktif;
    }

    public function getHalamanSebelum(){
        return $this->halamanAktif-1;
    }

    public function getHalamanSesudah(){
        return $this->halamanAktif+1;
    }

    public function getTimeProvince(){
        $queryTimeProvinces = "SELECT * FROM timeprovince ORDER BY date DESC";
        $query_result = $this -> db -> executeSelectQuery($queryTimeProvinces);

        $jumlahDataPerHalaman = 75;
        $jumlahData = count($query_result);
        $this->jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $this->halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $awalData = ($jumlahDataPerHalaman * $this->halamanAktif) - $jumlahDataPerHalaman;

        $queryTimeProvinces .= " LIMIT $awalData, $jumlahDataPerHalaman";
        $query_result = $this->db->executeSelectQuery($queryTimeProvinces);

        $timeProvinces = [];
        foreach($query_result as $key => $result){
            $timeProvinces[] = new TimeProvince($result['date'], $result['time'], $result['province'], $result['confirmed'], $result['released'], $result['deceased']);
        }

        return $timeProvinces;
    }

    public function getProvinces() {
		$queryProvinces = "SELECT province FROM timeprovince GROUP BY province ORDER BY province ASC";
		
		$query_result = $this -> db -> executeSelectQuery($queryProvinces);
		
		$provinces = [];
		foreach ($query_result as $key => $result) {
            $provinces[] = new ProvinceList($result['province']);
		}
        return $provinces;
    }
    
    public function getFirstDate() {
		$queryFirstDate = "SELECT date FROM timeprovince ORDER BY date ASC LIMIT 1";
		
		$query_result = $this -> db -> executeSelectQuery($queryFirstDate);
		
        return $query_result[0]['date'];
    }
    
    public function addData(){
        if (isset($_POST['date']) && isset($_POST['province']) && isset($_POST['confirmed']) && isset($_POST['released']) && isset($_POST['death'])) {
            if($_POST['confirmed'] != "" && $_POST['released'] !="" && $_POST['death'] != ""){
                $date = $_POST['date'];
                $province = $_POST['province'];
                $confirmed = $_POST['confirmed'];
                $released = $_POST['released'];
                $death = $_POST['death'];

                $query = "
                    INSERT INTO timeprovince (date, time, province, confirmed, released, deceased)
                    VALUES
                        ('" . $date . "', 0, '" . $province . "', " . $confirmed . ", " . $released . ", " . $death . ")
                ";

                $this->db->executeNonSelectQuery($query);
            }            
        }
    }
}
