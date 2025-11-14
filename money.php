<?php
if(isset($_COOKIE['login'])){


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $money = floatval($_POST['money']);
    $value = intval($_POST['value']);
    $user = $_COOKIE['login'];

    $money_2 = $money + ($money / 20);

  
    if ($value == 1) {
        $value_name = "PLN";
    } else if ($value == 2) {
        $value_name = "EUR";
    } else if ($value == 3) {
        $value_name = "USD";
    } else {
        $value_name = "UNKNOWN";
    }

    

    $conn = mysqli_connect("localhost", "root", "", "arosaka");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $stmt1 = mysqli_prepare($conn, "SELECT id_uzytkownika FROM uzytkownicy WHERE adres = ?");
    mysqli_stmt_bind_param($stmt1, "s", $user);
    mysqli_stmt_execute($stmt1);
    $result = mysqli_stmt_get_result($stmt1);

    if ($row = mysqli_fetch_assoc($result)) {
        $user_id = $row['id_uzytkownika'];

        
        $stmt2 = mysqli_prepare($conn, "INSERT INTO wplaty (id_uzytkownika, kwota, opis) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt2, "dds", $user_id, $money_2, $value_name); 

        if (mysqli_stmt_execute($stmt2)) {
            echo("udało się");
        } else {
            echo("ERROR: " . mysqli_error($conn));
        }
    } else {
        echo("User not found.");
    }

    mysqli_close($conn);
}
}
else{
    header("Location:login.php");
}


?>
