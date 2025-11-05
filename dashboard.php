<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $kwota = $_POST['kwota'];
    $opis = $_POST['opis'];
    if(isset($_COOKIE["login"]) && isset($_COOKIE["password"])){
        $login = $_COOKIE["login"];
        $today = date("Y-m-d");
        $conn = mysqli_connect("localhost","root","","arosaka");
        $userID = mysqli_query($conn, "SELECT id_uzytkownika FROM uzytkownicy WHERE adres = '$login'");

        $sql = "INSERT INTO wplaty('id_uzytkownika','kwota','opis') values($userID,$kwota,$opis)";
        $result = mysqli_query($conn, $sql);
    }
}

?>