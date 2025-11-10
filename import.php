<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
</head>
<body>
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
