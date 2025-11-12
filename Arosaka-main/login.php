<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost","root","","arosaka");

    $sql = "SELECT * FROM uzytkownicy WHERE adres = '" . mysqli_real_escape_string($conn, $login) . "'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        if($row["haslo"] == $password){
            setcookie("login", $login, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
            header("Location: dash_board.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>STRONA</h1>
        <nav>
            <a class="Iwant_to_talk_to_the_manager" href='login.php'">Logowanie</a>
            <a class="Iwant_to_talk_to_the_manager" href='register.html'">Rejestracja</a>
            <a class="Iwant_to_talk_to_the_manager" href='chceck.php'">Panel klienta</a>
            <a class="Iwant_to_talk_to_the_manager" href='about.html'">O funduszu</a>
            <a class="Iwant_to_talk_to_the_manager" href='check_3.php'">Kontakt</a>
            <a class="Iwant_to_talk_to_the_manager" href='calculator.php'">Kalkulator</a>
            <a class="Iwant_to_talk_to_the_manager" href='news.html'">Aktualności</a>
            <a class="Iwant_to_talk_to_the_manager" href='Regulamin.html'">Regulamin</a>
            <a class="Iwant_to_talk_to_the_manager" href='index.php'">Strona głowna</a>
        </nav>
    </header>

    <div class="mainContent">
        <form   action="login.php"  method="post" class="login">
        <h2 style="text-align:center">Login</h2>
        <div class="col">
            <br>
            <input type="text" name="login" placeholder="Login" required class="area">
            <br><br>
            <input type="password" name="password" placeholder="Password" required class="area">
            <br><br>
            <input type="submit" value="Login" class="btn">
            <br><br><br><br>
            <label>Nie masz jescze konta!<a href="register.html">Zarejestruj się</a></label>
        </div>
        </form>
    </div>

    <footer>Strona stworzona przez: Mateusz Zawisza, Krzysztof Mękal i józef sobolewski</footer>
</body>
</html>

