<?php

include "bootstrap/init.php";

// dd($_SERVER['REQUEST_METHOD']);

$home_url = site_url();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_GET['action'];
    $params = $_POST;
    if($action == 'register'){
        $result =register($params);
        if(!$result){
            message("Error L: an error in register");
        }else{
            message("congerogolate your regestration successfull . welcome to mmmtodo . <br>
            <a href='$home_url'>please log in</a>
            " , 'success');
        }
        dd($result);
    }else if($action == 'login'){
        $result = login($params['email'], $params['pass']);
        if(!$result){
            message("Error L: an error in Login data");
        }else{
            message("you are now successfull login. welcome to mmmtodo . <br>
            <a href='$home_url'>manage your task</a>
            " , 'success');
        }
    }
}




include "tpl/tpl-auth.php";