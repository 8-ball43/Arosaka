<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
$title = $_POST['title'];
$text = $_POST['text'];


$active_user = $_COOKIE['login'];
$conn = mysqli_connect("localhost","root","","arosaka");
$sql = "SELECT id_uzytkownika FROM uzytkownicy WHERE adres = '$active_user' ";
$result = mysqli_query($conn, $sql);

while($wiersz = mysqli_fetch_assoc($result)) {
    $id = $wiersz["id_uzytkownika"];
    $stmt = mysqli_prepare($conn, "INSERT INTO uwagi(id_uzytkownika,temat,tresc)VALUES(?,?,?)");
    mysqli_stmt_bind_param($stmt,"sss", $id, $title, $text);

    if(mysqli_stmt_execute($stmt)) {
        echo("dziękujemy za uwage");
    }
    else{
        echo("ERROR: coś poszło nie tak");
    }
    
}
}

?>