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
            <a class="Iwant_to_talk_to_the_manager" href='contact.html'">Kontakt</a>
            <a class="Iwant_to_talk_to_the_manager" href='calculator.html'">Kalkulator</a>
            <a class="Iwant_to_talk_to_the_manager" href='news.html'">Aktualności</a>
            <a class="Iwant_to_talk_to_the_manager" href='Regulamin.html'">Regulamin</a>
            <a class="Iwant_to_talk_to_the_manager" href='index.php'">Strona głowna</a>
        </nav>
    </header>

    <div class="mainContent">
        <form action="dashboard.php" class="payment" method="post" id="form">
            <label for="lname">Ilość wpłaty:</label><br>
            <input type="number" id="kwota" name="kwota" value="10" class="value" min="1"><br>
            <input type="radio" id="pln" name="opis" value="PLN" class="radio">
            <label for="pln">PLN</label><br>
            <input type="radio" id="eur" name="opis" value="EUR" class="radio">
            <label for="eur">EUR</label><br>
            <input type="radio" id="usd" name="opis" value="USD" class="radio">
            <label for="usd">USD</label>
            <br><br>
            <input type="submit" id="submit" value="Wpłać" class="submit">
            <p id="p"></p>
        </form>
        <form action="logout.php" method="post">
            <button type="submit" class="logout">Wyloguj się</button>
            <br>
            <br>
            <a class="Iwant_to_talk_to_the_manager" href="wallet.php">Mój portwel</a>
            <?php

                $login = $_COOKIE["login"];
                $conn = mysqli_connect("localhost","root","","arosaka");
                $result = mysqli_query($conn, "SELECT * FROM uzytkownicy WHERE adres = '$login'");

                $userID = mysqli_fetch_assoc($result);
                $ID = $userID["id_uzytkownika"];

                $result = mysqli_query($conn, "SELECT * FROM administratozy WHERE id_uzytkownika = $ID");

                if(mysqli_fetch_assoc($result)){
                    echo "<a class=Iwant_to_talk_to_the_manager href=wallet.php>Mój portwel2</a>";
                }
            ?>
        </form>
    </div>


    <footer>Strona stworzona przez: Mateusz Zawisza, Krzysztof Mękal i józef sobolewski</footer>
    <script>
        let form = document.getElementById("form");
        form.addEventListener("submit",function (e){
            
             let selectedCurrency = document.querySelector("input[name='opis']:checked");

             if(!selectedCurrency){
                e.preventDefault();
                document.getElementById("p").innerHTML = "Podaj walute";
                p.style.color="red";
             }
        });
    </script>
</body>
</html>