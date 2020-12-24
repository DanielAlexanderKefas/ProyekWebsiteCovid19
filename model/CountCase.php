<?php

class CountCase{
    protected $all;
    protected $active;
    protected $death;
    protected $recovered;

    public function __construct($all, $recovered, $active, $death)
    {
        $this->all = $all;
        $this->active = $active;
        $this->death = $death;
        $this->recovered = $recovered;
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

}