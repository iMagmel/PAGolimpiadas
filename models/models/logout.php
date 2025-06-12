<?php

session_start();
$_SESSION = array();

if(ini_get("session.user_cookies")){

    $params = session_get_cookie_params();

    setcookie(session_start(), "", time() = 42000, $params["path"], $params["domain"], 
    $params["secure"], $params["httponly"]);

}

session_destroy();
$mensajedestroy = "sesion cerrada";

?>