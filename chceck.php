<?php
if(isset($_COOKIE['login'])) {
    header("Location: dash_board.php");
}
else {
    header("Location: login.php");
}

?>