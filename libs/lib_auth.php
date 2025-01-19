<?php

/*  Auth Functions  */
function getCurrentUserId(){
    return 1;
}

function getUserByEmail($email){
    global $pdo;
    $sql = "SELECT * FROM `users` WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}

function logout(){
    unset($_SESSION['login']);
}

function login($email, $pass){
    $user = getUserByEmail($email);
    if(is_null($user)){
        return false;
    }

    if(password_verify($pass, $user->pass)){
        $_SESSION['login'] = $user;
    return true;

    }

    return false;
}


function isLoggedIn(){
    return isset($_SESSION['login']) ? true : false;
    
}
function getLoggedInUser(){
    return $_SESSION['login'] ?? null;
    
}

function register($userdata){
    global $pdo;

    $passHash = password_hash($userdata['pass'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (name, email, pass) VALUES (:name, :email, :pass)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $userdata['name'],
        ':email' => $userdata['email'],
        ':pass' => $passHash,
    ]);
    
    return $stmt->rowCount() ? true : false;
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isValidName($name) {
    return !empty($name) && strlen($name) >= 3;
}

function isValidPassword($password) {
    return !empty($password) && strlen($password) >= 6;
}
