<?php

include "bootstrap/init.php";

if(!isLoggedIn()){
    // redirect to aut form
    // header("location: " . site_url('auth.php'));
    // redirect(site_url('auth.php'));
}

if(isset($_GET['logout'])){
    logout();
}


// use Hekmatinasser\Verta\Verta;

// var_dump(Verta::now());
if(isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])){
    $deletedCount = deleteFolders($_GET['delete_folder']);
    // echo "$deletedCount folders succesfuly delete";
}

if(isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])){
    $deletedCount = deleteTask($_GET['delete_task']);
    // echo "$deletedCount Tasks succesfuly delete";
}

$folders = getFolders();

$tasks = getTasks();
// dd($tasks);
include "tpl/tpl-index.php";