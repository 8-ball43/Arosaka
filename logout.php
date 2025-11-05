<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();

    
    setcookie("login", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");

   
    session_unset();
    session_destroy();

    
    header("Location: login.php");
    exit;
}


?>