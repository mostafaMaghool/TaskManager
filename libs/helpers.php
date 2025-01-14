<?php

function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }else{
        return false;
    }

}

function diePage($msg){
    echo "<div>" . $msg . "</div>";
    die();
}