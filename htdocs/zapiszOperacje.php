<?PHP
    include 'dbconfig.php';

    $klientID = $_POST['klientID'];
    $towarID = $_POST['towar1ID'];
    $dataOperacji = $_POST['dataOperacji'];

    $conn = new mysqli($server, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Błąd połączenia z BD: " . $conn->connect_error);
    }

    $zapytanie = "INSERT INTO `operacje` (`idk`, `idt`, `data`) VALUES ('$klientID', '$towarID', '$dataOperacji');";


    $result = $conn->query($zapytanie);

    $conn->close();
    echo "<tr><td></td><td>$klientID</td><td>$towarID</td><td>$dataOperacji</td></tr>";
?>