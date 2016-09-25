<?php 

function checkPassword($password){
    if(strlen($password) < 6){
        return "Password must be atleast 6 characters long.";
    }else if(preg_match("/[^a-zA-Z0-9_@]/",$password)){
        return "Password can only contain A-Z, a-z, 0-9, _ and @.";
    }else{
        return "";
    }
}


//here we check whether the username is atleast 3 characters long
function checkUsername($username){
    if(strlen($username) < 3){
        return "Username must be atleast 3 characters long.";
    }else if(preg_match("/[^a-zA-Z-0-9_]/",$username)){
        return "Username can only contain alphabatical and numarical characters.";
    }else{
        return "";
    }    
}

function checkEmail($email){
    if(!(strpos($email,".")>0 && strpos($email,"@")>0) 
        || preg_match("/[^a-zA-Z0-9\._@-]/",$email) ){
            return "Email is not valid.";
        }else{
            return "";
        }
}

?>