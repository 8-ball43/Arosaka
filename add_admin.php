<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $number = $_POST['user'];
    $conn = mysqli_connect("localhost","root","","arosaka");
    $stmt = mysqli_prepare($conn, "INSERT INTO administratozy(id_uzytkownika)VALUES(?)");
    mysqli_stmt_bind_param($stmt,"s",$number);
    if(mysqli_stmt_execute($stmt)){
        echo("udało się");
    }
    else{
        echo("nie udało się");
    }
    

}
?>