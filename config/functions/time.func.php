<?php 
    //--------------Variables
    $codigoUnico = NULL;
    $minuts = 0;
    $month = date("m");
    $hour = date("G") - 5;
    $minuts_pre = date("i");
    $year = date("Y");
    $segundos = date("s");
    //----------------Calculo de horas para generear el codigo
    if ($minuts_pre == 60) {
        $minuts = 0 + 5;
        $hour = $hour +1;
    }elseif ($minuts_pre == 56)
    {
        $minuts = 1;
        $hour = $hour +1;
    }elseif ($minuts_pre == 57){
        $minuts = 2;
        $hour = $hour +1;
    }elseif ($minuts_pre == 58){
        $minuts = 3;
        $hour = $hour +1;
    }elseif ($minuts_pre == 59){
        $minuts = 4;
        $hour = $hour +1;
    }else{
        if($minuts == 60){
            $minuts =  5;
            $hour = $hour +1;
        }else{
            $minuts = $minuts_pre + 5;
        }
    
    }
    
    #$time = $hour.' '.$minuts.' '.$segundos.' '.$month.' '.$year;
    $time = $month+$hour+$minuts+$year;
?>