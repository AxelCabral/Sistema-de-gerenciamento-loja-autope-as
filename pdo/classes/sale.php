<?php
  class sale{
    private $date;
    private $value;

    //----------------Getters--------------------------------------- 
    function getValue(){
        return $this->value;
    }
    function getDate(){
        return $this->date;
    }
    //------------------Setters-------------------------------------
    function setValue($value){
        $this->value = $value;
    }
    function setDate($date){
        $this->date = $date;
    }
}