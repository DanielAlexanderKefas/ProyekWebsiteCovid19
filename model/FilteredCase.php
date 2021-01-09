<?php

class FilteredCase {
    protected $all;
    protected $active;
    protected $death;
    protected $recovered;
    protected $caseDate;

    public function __construct($all, $recovered, $active, $death, $caseDate)
    {
        $this->all = $all;
        $this->active = $active;
        $this->death = $death;
        $this->recovered = $recovered;
        $this->caseDate = $caseDate;
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

    public function getCaseDate()
    {
        return $this->caseDate;
    }
}