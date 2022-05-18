<?php
    function sum_all($stmt){
        $sum_all = 0;
        foreach($stmt as $sum){
            $sum_all = $sum_all+$sum->valor;
        }
        return $sum_all;
    }
