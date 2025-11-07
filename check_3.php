<?php
if(isset($_COOKIE['login'])) {
    header("Location: contact.html");
}
else {
    header("Location: login.php");
}

?>