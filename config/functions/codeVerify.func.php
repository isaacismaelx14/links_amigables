<?php 


 $min = 0;
 $max = 9; 
 $min2 = 0;
 $max2 = 9; 
 $count = 3;
 
     $nums = range($min, $max);
     $nums2 = range($min2, $max2);
     shuffle($nums);
     shuffle($nums2);
     
     $response = array();
     $response2 = array();
     for($i=0;$i<$count && $i<count($nums);$i++)
     {
         array_push($response, $nums[$i]);
     }
     for($i=0;$i<$count && $i<count($nums2);$i++)
     {
         array_push($response2, $nums2[$i]);
     }
     
    
 
 
 $pr = implode ( "", $response2 );
 $pa = implode ( "", $response );
 
 $codigo = $pr.'-'.$pa;
 ?>
