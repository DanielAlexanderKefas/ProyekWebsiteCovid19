<?php

class TimeProvince{
    protected $date;
    protected $time;
    protected $province;
    protected $confirmed;
    protected $released;
    protected $deceased;

    public function __construct($date, $time, $province, $confirmed, $released, $deceased){
        $this->date = $date;
        $this->time = $time;
        $this->province = $province;
        $this->confirmed = $confirmed;
        $this->released = $released;
        $this->deceased = $deceased;
    }

    public function getDate(){
        return $this->date;
    }

    public function getTime(){
        return $this->time;
    }

    public function getProvince(){
        return $this->province;
    }

    public function getConfirmed(){
        return $this->confirmed;
    }

    public function getReleased(){
        return $this->released;
    }

    public function getDeceased(){
        return $this->deceased;
    }
}
