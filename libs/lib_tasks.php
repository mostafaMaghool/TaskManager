<?php

/*** Foldeer Function ***/
function deleteFolders($folder_id){
    global $pdo;
    $sql = "delete from folders where id = $folder_id";
    $stmt = $pdo-> prepare($sql);
    $stmt ->execute();
    return $stmt ->rowCount();
}

function addFolders($folder_name) {
    global $pdo;
    $current_user_id = getCurrentUserId();

    // کوئری SQL صحیح
    $sql = "INSERT INTO `folders` (name, user_id) VALUES (:folder_name, :user_id);";
    $stmt = $pdo->prepare($sql);

    // مقادیر پارامترها
    $stmt->execute([
        ':folder_name' => $folder_name,
        ':user_id' => $current_user_id
    ]);

    // بازگشت تعداد ردیف‌های تغییر یافته
    return $stmt->rowCount();
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