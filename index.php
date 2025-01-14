<?php

include "bootstrap/init.php";

// use Hekmatinasser\Verta\Verta;

// var_dump(Verta::now());
if(isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])){
    $deletedCount = deleteFolders($_GET['delete_folder']);
    // echo "$deletedCount folders succesfuly delete";
}

$folders = getFolders();

$tasks = getTasks();
include "tpl/tpl-index.php";