<?php
  class buy{
    private $code;
    private $unitys;
    private $company;
    private $value;
    private $date;
    private $unit_value;

    //----------------Getters--------------------------------------- 
    function getCode(){
        return $this->code;
    }
    function getUnitys(){
        return $this->unitys;
    }
    function getCompany(){
        return $this->company;
    }
    function getValue(){
        return $this->value;
    }
    function getDate(){
        return $this->date;
    }
    //------------------Setters-------------------------------------
    function setCode($code){
        $this->code = $code;
    }
    function setUnitys($unitys){
        $this->unitys = $unitys;
    }
    function setCompany($company){
        $this->company = $company;
    }
    function setValue($value){
        $this->value = $value;
    }
    function setDate($date){
        $this->date = $date;
    }
}
