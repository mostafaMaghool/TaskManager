<?php
include "constants.php";
include "config.php";
include "vendor/autoload.php";
include "libs/helpers.php";

$dsn = "mysql:dbname=$database_config->db;host={$database_config->host}";

try{
    $pdo = new pdo($dsn, $database_config->user, $database_config->pass);
}catch(PDOEexeption $e){
    diePage("connection failed" . $e->getMessage());
}
// echo"conection database is ok";

include "libs/lib_auth.php";
include "libs/lib_tasks.php";


