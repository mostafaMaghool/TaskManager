<?php

include "../bootstrap/init.php";

if(!isAjaxRequest()){
    diePage("Invalid request!");
}
if(!isset($_POST['action']) || empty($_POST['action'])){
    diePage("Invalid action !");
}

switch($_POST['action']){
    case "addFolder":
        if(!isset($_POST['folderName']) || strlen($_POST['folderName']) <3){
            echo "نام باید بیشتر از 2 حرف باشد";
            die();
        }
        echo addFolders($_POST['folderName']);
    break;
    case "addTask":
        // var_dump($_POST);
    default:
        diePage("invalid action");
}

var_dump($_POST);