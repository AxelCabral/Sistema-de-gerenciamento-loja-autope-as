<?php
class expense{
    private $name;
    private $value;
    private $date;

    //----------------Getters--------------------------------------- 
    function getName(){
        return $this->name;
    }
    function getValue(){
        return $this->value;
    }
    function getDate(){
        return $this->date;
    }
    //------------------Setters-------------------------------------
    function setName($name){
        $this->name = $name;
    }
    function setValue($value){
        $this->value = $value;
    }
    function setDate($date){
        $this->date = $date;
    }
}
