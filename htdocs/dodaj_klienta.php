<?php
    include 'dbconfig.php';
    
    $nazwa = $_POST['nazwa'];
    $adres = $_POST['adres'];
    $opis = $_POST['opis'];


    $conn = new mysqli($server, $user, $password, $dbname); 
    if ($conn->connect_error) {
        die("Błąd połączenia z BD: " . $conn->connect_error);
    }

    $zapytanie = "INSERT INTO `klienci` (`id`, `nazwa`, `adres`, `opis`) VALUES (NULL, '$nazwa', '$nazwa', '$opis');";

   
    $result = $conn->query($zapytanie);

    $conn->close();
    ?>

<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatyczny powrót</title>
    <script>
        setTimeout(function() {
            window.history.back();
        }, 1000); // 1000 ms = 1 sekunda
    </script>
</head>
<body>
    <h1>Za chwilę nastąpi powrót...</h1>
</body>
</html>