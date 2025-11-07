<!DOCTYPE HTML>
<html>
    <head>
        <title>twój portwel</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h1>Twój Portwel</h1>
            <a class="Iwant_to_talk_to_the_manager" href="chceck.php">Wróć</a>
        </header>
        <main class="mainContent2">
            <br>
            <br>
            <div class="wallet">
              <h2>Twoje aktualne środki:</h2>
              <?php
             $user = $_COOKIE['login'];
             $conn = mysqli_connect("localhost","root","","arosaka");
             $stmt01 = mysqli_prepare($conn, " SELECT SUM(kwota) AS suma FROM wplaty INNER JOIN uzytkownicy ON wplaty.id_uzytkownika = uzytkownicy.id_uzytkownika WHERE wplaty.OPIS = 'EUR' AND uzytkownicy.adres = ?");
             mysqli_stmt_bind_param($stmt01, "s", $user);
             mysqli_stmt_execute($stmt01);
             mysqli_stmt_bind_result($stmt01, $suma);
             mysqli_stmt_fetch($stmt01);
             echo($suma." EUR<br><br>");
             mysqli_stmt_free_result($stmt01);
             mysqli_stmt_close($stmt01);
            
             
             $stmt02 = mysqli_prepare($conn, "SELECT SUM(kwota) AS suma FROM wplaty INNER JOIN uzytkownicy ON wplaty.id_uzytkownika = uzytkownicy.id_uzytkownika WHERE wplaty.opis = 'USD' AND uzytkownicy.adres = ?"); 
             mysqli_stmt_bind_param($stmt02, "s", $user);
             mysqli_stmt_execute($stmt02);
             mysqli_stmt_bind_result($stmt02, $suma2);
             mysqli_stmt_fetch($stmt02);
             echo($suma2." USD<br><br>");
             mysqli_stmt_free_result($stmt02);
             mysqli_stmt_close($stmt02);

             $stmt03 = mysqli_prepare($conn, " SELECT SUM(kwota) AS suma FROM wplaty INNER JOIN uzytkownicy ON wplaty.id_uzytkownika = uzytkownicy.id_uzytkownika WHERE wplaty.OPIS = 'PLN' AND uzytkownicy.adres = ?");
             mysqli_stmt_bind_param($stmt03, "s", $user);
             mysqli_stmt_execute($stmt03);
             mysqli_stmt_bind_result($stmt03, $suma3);
             mysqli_stmt_fetch($stmt03);
             echo($suma3 ?? '0'." PLN<br><br>");
             mysqli_stmt_free_result($stmt03);
             mysqli_stmt_close($stmt03);
            


              ?>
            </div>
            <div class="history">
                <h2>Historia twoich przelewów</h2>
                <table border>
                    <tr>
                        <th>Kwota</th>
                        <th>Opis</th>
                        <th>Data</th>
                        <th>Wzrost</th>
                    </tr>
                    <?php
                     $stmt2 = mysqli_prepare($conn,"SELECT wplaty.kwota, wplaty.opis, wplaty.data FROM wplaty INNER JOIN uzytkownicy ON wplaty.id_uzytkownika = uzytkownicy.id_uzytkownika WHERE uzytkownicy.adres = ?");
                     mysqli_stmt_bind_param($stmt2, "s", $user);
                     mysqli_stmt_execute($stmt2);
                     $result = mysqli_stmt_get_result($stmt2);
                     while($row = mysqli_fetch_assoc($result)) {
                        echo("<tr><td>".$row['kwota']."</td><td>".$row['opis']."</td><td>".$row['data']."</td><td>+0</td></tr>");
                     }
                     
                    ?>
                </table>
            </div>
        </main>
    </body>
</html>
<script>
    
</script>