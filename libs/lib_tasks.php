<?php

/*** Foldeer Function ***/
function deleteFolders($folder_id){
    global $pdo;
    $sql = "delete from folders where id = $folder_id";
    $stmt = $pdo-> prepare($sql);
    $stmt ->execute();
    return $stmt ->rowCount();
}

function addFolders($data){

}

function getFolders(){
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "select * from folders where user_id = $current_user_id";
    $stmt = $pdo-> prepare($sql);
    $stmt ->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}


/*** Foldeer Function ***/
function removeTasks(){
    return 1;
}
function addTasks(){
    return 1;
}
function getTasks(){
    return 1;
}