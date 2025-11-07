<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $kwota = $_POST['kwota'];
    $opis = $_POST['opis'];
    if($opis == null){
        header("Location:dashboard.html");
        
    }
    else {
    if(isset($_COOKIE["login"]) && isset($_COOKIE["password"])){
        $login = $_COOKIE["login"];
        $conn = mysqli_connect("localhost","root","","arosaka");
        $result = mysqli_query($conn, "SELECT id_uzytkownika FROM uzytkownicy WHERE adres = '$login'");

        $userID = mysqli_fetch_assoc($result);
        $ID = $userID["id_uzytkownika"];

        $sql = $conn->prepare("INSERT INTO wplaty (id_uzytkownika,kwota,opis) values(?,?,?)");
        $sql->bind_param("sss", $ID, $kwota, $opis);
        if(mysqli_stmt_execute($sql)) {
            header("Location:wallet.php");
        }
        
         $conn->close();
        
    }
 }
}
?>