<?php
if(isset($_COOKIE['login'])) {
    header("Location: calculator.html");
}
else {
    header("Location: login.php");
}

?>