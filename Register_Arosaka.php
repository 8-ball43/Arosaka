<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['pass'];
    $adres = $_POST['email'];
    
   $conn = mysqli_connect("localhost","root","","arosaka");
   if (!$conn) {
      die("Błąd połączenia: " . mysqli_connect_error());
  }

  $stmt = mysqli_prepare($conn,"INSERT INTO uzytkownicy(login,haslo,adres)VALUES(?,?,?)");
  mysqli_stmt_bind_param($stmt,"sss",$login, $password, $adres);
   if(mysqli_stmt_execute($stmt)) {
    echo("utworzono konto");
  }
  else{
    
    $sql = "SELECT*FROM uzytkownicy";
  $result = mysqli_query($conn, $sql);
  
  while($wiersz = mysqli_fetch_assoc($result)) {
        if($wiersz['login']== $login) {
            echo("Error:Nie utworzono konta ponieważ taki użutkownik o takim loginie już istnieje<br> ");
        }
         
            if($wiersz['adres'] == $adres){
            echo("Error:Nie utworzono konta bo na tym E-mailu już konto istnieje");
        }
        else{
            echo("Error:coś poszło nie ta");
        }
        
  }
    
  }

  
}

 

?>