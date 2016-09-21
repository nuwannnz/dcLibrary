<?php 
//this file creates a connection to the MYSQL database.

require_once('../config.php');

$conn = mysqli_connect($database['hostname'],$database['username'],$database['password'],$database['database']);

if(!$conn){
    die("Something went wrong" . mysqli_connect_error());
}
?>