<?php 
//this file creates a connection to the MYSQL database.

$conn = mysqli_connect($database['hostname'],$database['username'],$database['password'],$database['database']);

if(!$conn){
    die("Something went wrong. We are unable to connect to our database." . mysqli_connect_error());
}
?>