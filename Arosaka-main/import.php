<?php
 if(!isset($_COOKIE['login'])){
    header("location:login.php");
    exit();
 }
 else{
    $conn = mysqli_connect("localhost","root","","arosaka");

    $adres = $_COOKIE['login'];
    $password = $_COOKIE['password'];

    $stmt = mysqli_prepare($conn,"SELECT*FROM uzytkownicy WHERE adres = ?");
    mysqli_stmt_bind_param($stmt,"s",$adres);
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if($row['haslo'] != $password){
            header("location:login.php");
            exit();
        }
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
</head>
<body>
    <form action="money.php" method="post">
    <label>Podaj kwote:</label>
    <input type="number" id="money" name="money" required><br><br>
    <select id="value" name="value">
        <option value="1">PLN</option>
        <option value="2">EUR</option>
        <option value="3">USD</option>
    </select>
    <select>
     <option value="1">American Express Co</option>
     <option value="2">3M Co</option>
     <option value="3">Amgen Inc</option>
     <option value="4">Apple Inc</option>
     <option value="5">Boeing Co</option>
     <option value="6">Caterpillar Inc</option>
     <option value="7">Chevron Corp</option>
     <option value="8">Cisco Systems Inc</option>
     <option value="9">Coca-Cola Co</option>
     <option value="10">Dow Inc</option>
     <option value="11">Goldman Sachs Group Inc</option>
     <option value="12">Home Depot Inc</option>
     <option value="13">Honeywell International Inc</option>    
    <select>
        <br><br>
        <button type="submit">Zainwestuj</button>
    </form>
    <?php

$inputFile = "Kopia Arkusz weryfikacji spółek - DJIA - baza danych.csv";
$outputFile = "djia_clean.csv";

if (!file_exists($inputFile)) {
    die("Brak pliku źródłowego!");
}

$handle = fopen($inputFile, "r");
$rows = [];

while (($row = fgetcsv($handle, 0, ",")) !== false) {
    $rows[] = $row;
}
fclose($handle);

$companyRow = $rows[1]; // wiersz z nazwami spółek + tickerami
$dataStart = 3;         // dane zaczynają się od 4 wiersza (index 3)

// przygotuj nagłówki do CSV wynikowego
$output = fopen($outputFile, "w");
fputcsv($output, ["company", "ticker", "date", "close"]);

echo ("<h2>Dane DJIA (converted)</h2>");
echo("<table>");
echo ("<tr><th>Company</th><th>Ticker</th><th>Date</th><th>Close</th></tr>");

// każda spółka zajmuje 2 kolumny: Name/Ticker oraz Date/Close
for ($col = 0; $col < count($companyRow); $col += 2) {
    
    $company = $companyRow[$col];
    $ticker  = $companyRow[$col+1];

    for ($r = $dataStart; $r < count($rows); $r++) {
        $date  = $rows[$r][$col];
        $close = $rows[$r][$col+1];

        if ($date == "" || $close == "") continue;

        // zamień polskie przecinki w cenach na kropki
        $close = str_replace(",", ".", $close);

        $record = [$company, $ticker, $date, $close];
        
        // zapis do CSV
        fputcsv($output, $record);

        // wyświetlenie na stronie
        echo ("<tr>
                <td>$company</td>
                <td>$ticker</td>
                <td>$date</td>
                <td>$close</td>
                
              </tr>");
    }
}

fclose($output);

echo ("</table><hr>");
echo ("<h3>✅ Konwersja zakończona</h3>");
echo ("Plik wynikowy: <strong>$outputFile</strong><br>");

$conn = mysqli_connect("localhost","root","","arosaka");
$stmt = mysqli_prepare($conn, "INSERT INTO spolki(company, ticker, date, close)VALUES(?,?,?,?)");
mysqli_stmt_bind_param($stmt,"ssss",$company,$ticker,$date,$close);
if(mysqli_stmt_execute($stmt)){
    echo("tak");
}

?>

</body>
</html>
