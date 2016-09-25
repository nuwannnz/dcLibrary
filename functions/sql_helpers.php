<?php 


function fixString($string){
    
        $string = stripslashes($string);    
        return htmlentities($string);
      //return $string;
    
}

?>