<?php defined('BASE_PATH' ) OR die("Permision Denide");

function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }else{
        return false;
    }

}

function site_url($uri = ''){
    return BASE_URL . $uri;
}

function diePage($msg){
    echo "<div>" . $msg . "</div>";
    die();
}


function dd($var){
    echo"<pre style='color: red;   position: relative;   z-index: 999;   padding: 10px;   margin: 10px;   border-radius: 5px;   background: aliceblue;   border-left: 3px solid;'>";
    var_dump($var);
    echo"</pre>";
}