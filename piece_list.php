<?php
    function pieceListNames($stmt){
        $name = "";
        $count = 0;
        $arr[0] = "-";
        foreach($stmt as $buy){
            $name = $buy->cod;
            $unitys = 0;
            $confirmation = true;
            foreach($stmt as $quantity){
                if($name == $quantity->cod){
                    $unitys = $unitys+$quantity->quantidade;
                }
            }
            for($i = 0; $i < $count; $i++){
                if($name == $arr[$i]){
                    $confirmation = false;
                } 
            }
            if($confirmation == true){
                
                $arr[$count] = $name;
                $arr2[$count] = $unitys;
                
                for($i = 0; $i < $count; $i++){
                    if($unitys > $arr2[$i]){
                        $old_value = $arr2[$i];
                        $old_name = $arr[$i];

                        $arr2[$i] = $unitys;
                        $arr[$i] = $name;
                        
                        $arr2[$count] = $old_value;
                        $arr[$count] = $old_name;
                    }
                }
                $count++;
            }
        }
        return $arr;
    }
    function pieceListValues($stmt){
        $name = "";
        $count = 0;
        $arr[0] = "";
        $arr2[0] = 0;
        foreach($stmt as $buy){
            $name = $buy->cod;
            $unitys = 0;
            $confirmation = true;
            foreach($stmt as $quantity){
                if($name == $quantity->cod){
                    $unitys = $unitys+$quantity->quantidade;
                }
            }
            for($i = 0; $i < $count; $i++){
                if($name == $arr[$i]){
                    $confirmation = false;
                } 
            }
            if($confirmation == true){
                
                $arr[$count] = $name;
                $arr2[$count] = $unitys;
                
                for($i = 0; $i < $count; $i++){
                    if($unitys > $arr2[$i]){
                        $old_value = $arr2[$i];
                        $old_name = $arr[$i];

                        $arr2[$i] = $unitys;
                        $arr[$i] = $name;
                        
                        $arr2[$count] = $old_value;
                        $arr[$count] = $old_name;
                    }
                }
                $count++;
            }
        }
        return $arr2;
    }
