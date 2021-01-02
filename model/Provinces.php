<?php

class ProvinceList {
    protected $province;

    public function __construct($province)
    {
        $this->province = $province;
    }

    public function getProvince()
    {
        return $this->province;
    }
}