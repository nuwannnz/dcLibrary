<?php 

//this function will check whether a session exsits, 
//if not it will start a session.
function checkSession(){
    if(session_id == ''){
        session_start();
    }
    return true;
}


//this function will return the details about the session.
function getSessionDetail(){
    checkSession();
    return $_SESSION['user_detail'];
}




?>