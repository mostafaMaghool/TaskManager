<?php
include "constants.php";
include BASE_PATH. "bootstrap/config.php";
include BASE_PATH. "vendor/autoload.php";
include BASE_PATH. "libs/helpers.php";



$dsn = "mysql:dbname=$database_config->db;host={$database_config->host}";

try{
    $pdo = new pdo($dsn, $database_config->user, $database_config->pass);
}catch(PDOEexeption $e){
    diePage("connection failed" . $e->getMessage());
}
// echo"conection database is ok";

include BASE_PATH. "libs/lib_auth.php";
include BASE_PATH. "libs/lib_tasks.php";


