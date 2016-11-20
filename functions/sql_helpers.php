<?php 

// convert a string in to a safer format which can be used in MYSql server
function fixString($string){
    
        $string = stripslashes($string);    
        return htmlentities($string);      
    
}

?>