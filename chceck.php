<?php
if(isset($_COOKIE['login'])) {
    header("Location: dashboard.html");
}
else {
    header("Location: login.php");
}

?>