<meta http-equiv="refresh" content="2;url=index.php"/>

<?php
    include 'dbconfig.php';
    
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $ilosc = $_POST['ilosc'];
    $dostawca = $_POST['dostawca'];
    $id = $_POST['id'];


    $conn = new mysqli($server, $user, $password, $dbname); 
    if ($conn->connect_error) {
        die("Błąd połączenia z BD: " . $conn->connect_error);
    }

    $zapytanie = "UPDATE `towary` SET `nazwa` = '$nazwa', `cena` = '$cena', `ilosc` = '$ilosc', `dostawca` = '$dostawca' WHERE `towary`.`id` = $id; ";

   
    $result = $conn->query($zapytanie);

    $conn->close();
    ?>

<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatyczny powrót</title>
</head>
<body>
    <h1>Za chwilę nastąpi powrót...</h1>
</body>
</html>