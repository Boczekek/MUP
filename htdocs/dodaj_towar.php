<?php
    include 'dbconfig.php';
    
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $ilosc = $_POST['ilosc'];
    $dostawca = $_POST['dostawca'];


    $conn = new mysqli($server, $user, $password, $dbname); 
    if ($conn->connect_error) {
        die("Błąd połączenia z BD: " . $conn->connect_error);
    }

    $zapytanie = "INSERT INTO `towary` (`id`, `nazwa`, `cena`, `ilosc`, `dostawca`) VALUES (NULL, '$nazwa', '$cena', '$ilosc', '$dostawca');";

   
    $result = $conn->query($zapytanie);

    $conn->close();
    echo "<tr><td></td><td>$nazwa</td><td>$cena</td><td>$ilosc</td><td>$dostawca</td><td></td></tr>";
    ?>