<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost","root","","arosaka");

    $sql = sprintf("Select * from uzytkownicy where adres = " . mysqli_real_escape_string($conn, $login));
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        if($row["haslo"] == $password){
            echo "Correct Password";
            setcookie("login", $login, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
        }
        else{
            echo "Incorrect Password";
        }
    }
}
?>

