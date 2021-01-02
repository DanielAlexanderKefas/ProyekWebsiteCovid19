<?php

class ProvinceList {
    protected $province;

    public function __construct($province)
    {
        $this->all = $all;
        $this->active = $active;
        $this->death = $death;
        $this->recovered = $recovered;
        $this->province = $province;
    }

    public function getAll(){
        return $this->all;
    }

    public function getDeath()
    {
        return $this->death;
    }

    public function getRecovered()
    {
        return $this->recovered;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getProvince()
    {
        return $this->province;
    }
}