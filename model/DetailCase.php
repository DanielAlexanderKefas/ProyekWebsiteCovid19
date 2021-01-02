<?php

class DetailCase {
    protected $all;
    protected $active;
    protected $death;
    protected $recovered;
    protected $province;

    public function __construct($all, $recovered, $active, $death, $province)
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