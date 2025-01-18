<?php

include "../bootstrap/init.php";

if(!isAjaxRequest()){
    diePage("Invalid request!");
}
if(!isset($_POST['action']) || empty($_POST['action'])){
    diePage("Invalid action !");
}

switch($_POST['action']){
    case "doneSwitch":
        $task_id = $_POST['taskId'];
        if(!isset($task_id) || !is_numeric($task_id)){
            echo "is not a valid task ID";
            die();
        }
        $result = doneSwitch($task_id);
        echo $result ? '1' : '0';
        break;

    case "addFolder":
        if(!isset($_POST['folderName']) || strlen($_POST['folderName']) <3){
            echo "نام باید بیشتر از 2 حرف باشد";
            die();
        }
        echo addFolder($_POST['folderName']);
    break;
    case "addTask":
        // var_dump($_POST);
        $folderId = $_POST['folderId'] ?? 0;
        $taskTitle = $_POST['taskTitle'] ?? '';
          
    
        if (empty($taskTitle) || empty($folderId)) {
            echo "فو.لدر انتخاب نشده";
            die();
        }        

        echo addTask($taskTitle,$folderId);
    break;
    default:
        diePage("invalid action");
}

var_dump($_POST);