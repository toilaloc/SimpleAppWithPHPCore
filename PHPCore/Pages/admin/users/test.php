<?php 

 $a = 3;
 function test($b){
     return $GLOBALS['a'] + $b;
 }
 echo test(4);

?>