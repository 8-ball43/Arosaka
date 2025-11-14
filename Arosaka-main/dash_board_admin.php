<?php
 if(!isset($_COOKIE['login'])){
    header("Location:login.php");
 }
 else{
    $adres = $_COOKIE['login'];
    $password = $_COOKIE['password'];
    $conn = mysqli_connect("localhost","root","","arosaka");
    $stmt = mysqli_prepare($conn,"SELECT*FROM uzytkownicy WHERE adres = ?");
    mysqli_stmt_bind_param($stmt,"s",$adres);
    if(mysqli_stmt_execute($stmt)){
        
    
    $result_one = mysqli_stmt_get_result($stmt);
    $row_one = mysqli_fetch_assoc($result_one);
    if($row_one['haslo'] != $password){
        header("Location: login.php");
        exit();
    }
    }
    else{
        $result_second = mysqli_query($conn, "SELECT*FROM administratozy");
        $row_second = mysqli_fetch_assoc($result_second);
        if($row_one['id_uzytkownika'] != $row_second['id_uzytkownika']){
            header("Location:login.php");
            exit();
        }
    }
 }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panel_admina</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a class="Iwant_to_talk_to_the_manager" href="dash_board.php">Wróć</a>
    </header>
        <main>
            <div class="block_a">
                <h2>Wiadomości które przysły:</h2>
                <table border>
                    <tr>
                        <th>OD</th>
                        <th>NR_UWAGI</th>
                        <th>TEMAT</th>
                        <th>TRESC</th>
                        <th>DATA</th>
                    <tr>
                <?php
                 
                 $sql = "SELECT  uzytkownicy.login ,uwagi.id_uwagi, uwagi.temat, uwagi.tresc, uwagi.data FROM uwagi INNER JOIN uzytkownicy ON uwagi.id_uzytkownika = uzytkownicy.id_uzytkownika ORDER BY data";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo("<tr><td>".$row['login']."</td><td>".$row['id_uwagi']."</td><td>".$row['temat']."</td><td>".$row['tresc']."</td><td>".$row['data']."</td></tr>");
                }
                


                ?>
                </table>
                <br>
            <form action="delete.php" method="post">
                <label>Podaj numer uwagi do uszunięcia</label>
                <input type="number" name="number" id="number">
                <input type="submit" value="Usun">
            </form>
            </div>
            <div class="block_b">
                <h2>Użytkownicy:</h2>
                <table border>
                    <tr>
                        <th>Nazwa</th>
                        <th>numer_uzytkownika</th>
                        <th>adres<th>
                    </tr>
                <?php
                $sql2 = "SELECT login ,id_uzytkownika, adres FROM uzytkownicy";
                $result2 = mysqli_query($conn, $sql2);
                while($row2 = mysqli_fetch_assoc($result2)){
                    echo("<tr><td>".$row2['login']."</td><td>".$row2['id_uzytkownika']."</td><td>".$row2['adres']."</td></tr>");
                }
                ?>
                </table>
            </div>
            <br>
            <div>
                <h2>Nadaj uprawnienia</h2>
                <form action="add_admin.php" method="post">
                    <label>Numer uzykownika:</label>
                    <input type="text" id="user_name" name="user" required>
                    <br>
                    <button type="submit">Nadaj</button>
                </form>
        </main>
    
</body>
</html>