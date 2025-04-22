<?PHP


include 'dbconfig.php';
$id = $_GET['id'];
$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia z BD: " . $conn->connect_error);
}

$zapytanie = "DELETE FROM towary WHERE `id` = $id";
            
$result = $conn->query($zapytanie);

$conn->close();
?>

<script>
    setTimeout(function() {
        window.history.back();
    }, 1000); // 1000 ms = 1 sekunda
</script>