<?php 

/*
This file contains all the global data for the rest of application.
*/

$root = $_SERVER['DOCUMENT_ROOT'] . "/dashboard/diwe_final/site";
$project_root = "/dashboard/diwe_final/site";

$paths = array(
    "images" =>  $root . "/images",
    "js" =>  $root . "/js",
    "css" =>  $root . "/css",
    "models" => $root . "/models",
    "include" =>  $root . "/include",
    "functions" => $root . "/functions",
    "templates" => $root . "/templates",
    "resources" => $root . "/resources",
    "submit_forms" => $root . "/submit_forms",
    "user" => $root . "/user",
    "public" => $root . "/public",
    "admin" => $root . "/admin",
);

$header_paths = array(
    "templates" => $project_root . "/templates",
    "public" => $project_root . "/public",
    "css" =>  $project_root . "/css",
    "submit_forms" => $project_root . "/submit_forms",
    "js" =>  $project_root . "/js",
    "resources" => $project_root . "/resources",
    "images" =>  $project_root . "/images",
);

//details about the database connection
$database = array(
    "hostname" => "127.0.0.1",
    "username" => "root",
    "password" => "",
    "database" => "dc_library",
);


?>