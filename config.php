<?php 

/*
This file contains all the global data for the rest of application.
*/

$root = $_SERVER['DOCUMENT_ROOT'] . "/dashboard/diwe_final/site";
$paths = array(
    "images" =>  $root . "/images",
    "scripts" =>  $root . "/js",
    "styles" =>  $root . "/css",
    "models" => $root . "/models",
    "include" =>  $root . "/include",
    "functions" => $root . "/functions",
    "templates" => $root . "/templates",
    "resources" => $root . "/resources",
    "user" => $root . "/user",
    "public" => $root . "/public",
    "admin" => $root . "/admin",
);

//details about the database connection
$database = array(
    "hostname" => "127.0.0.1",
    "username" => "root",
    "password" => "",
    "database" => "library_db",
);


?>