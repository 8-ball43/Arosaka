<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $number = $_POST['number'];
    $conn = mysqli_connect("localhost","root","","arosaka");
    $stmt = mysqli_prepare($conn, "DELETE FROM uwagi WHERE id_uwagi = ?");
    mysqli_stmt_bind_param($stmt,"s",$number);
    if(mysqli_stmt_execute($stmt)){
        header("Location:dash_board_admin.php");
    }
    else{
        echo("ERROR: Coś poszło nie tak");
    }
}
?>