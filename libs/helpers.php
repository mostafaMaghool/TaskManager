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
// function redirect($uri){
//     header("location: $url");
//     die();
// }

function diePage($msg){
    echo "<div style='color: red;   position: relative;   z-index: 999;   padding: 10px;   margin: 10px;   border-radius: 5px;   background: aliceblue;   border-left: 3px solid;'>" . $msg . "</div>";

    die();
}
function message($msg, $cssClass = 'info'){
    echo "<div class'$cssClass' style='color: red;   position: relative;   z-index: 999;   padding: 10px;   margin: 10px;   border-radius: 5px;   background: aliceblue;   border-left: 3px solid;'>" . $msg . "</div>";
}


function dd($var){
    echo"<pre style='color: red;   position: relative;   z-index: 999;   padding: 10px;   margin: 10px;   border-radius: 5px;   background: aliceblue;   border-left: 3px solid;'>";
    var_dump($var);
    echo"</pre>";
}