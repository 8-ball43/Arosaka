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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Strona</h1>
        <nav>
        <ul>
            <li><a href="">Test</a></li>
            <li><a href="">Test</a></li>
            <li><a href="">Test</a></li>
            <li><a href="">Test</a></li>
        </ul>
    </nav>    
    </header>
    <div class="container">
        <form method="post">
        <h2 style="text-align:center">Login</h2>
        <div class="col">
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </div>
        </form>
    </div>
</body>
</html>
