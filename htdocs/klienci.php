<h1>Klienci</h1>
<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th>Lp.</th>
            <th>Nazwa</th>
            <th>Adres</th>
            <th>Opis</th>
            <th>Akcja</th>
        </tr>
    </thead>
    <tbody>
    <?php
    include 'dbconfig.php';
    
    $conn = new mysqli($server, $user, $password, $dbname); 
    if ($conn->connect_error) {
        die("Błąd połączenia z BD: " . $conn->connect_error);
    }

    session_start();

    $zapytanie = "SELECT * FROM klienci";

    $result = $conn->query($zapytanie);

    if ($result->num_rows > 0) {
        $licznik=1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $licznik++ . "</td><td>" . $row["nazwa"] . "</td><td>" . $row["adres"] . "</td><td>" . $row["opis"] . "</td>";
            
            if(isset($_SESSION['login'])){
            echo "<td><a class='del' href='delklient.php?id=".$row["id"]."'>Usuń</a> | ";
            echo "<a class='edit' href='editklient.php?id=".$row["id"]."'>Edtuj</a>";
            echo "</td></tr>\n";
            }
            else {
                echo "<td>[Brak urawnień]</td></tr>\n";
            };
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
    </tbody>
</table>

<?php
if(isset($_SESSION['login'])){
?>

<div class="center">
    <form action="dodaj_klienta.php" method="post" class="dodawanie">
        <h2>Dodawanie klientów</h2>
        <div class="form-group">
            <label for="nazwa">Nazwa:</label>
            <input type="text" class="form-control" id="nazwa" name="nazwa" placeholder="Wpisz nazwę" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="adres">Adres:</label>
            <input type="text" class="form-control" id="adres" name="adres" placeholder="Wpisz adres" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="opis">Opis:</label>
            <textarea type="text" class="form-control" id="opis" name="opis" placeholder="Możesz wpisać opis" autocomplete="off">  
            </textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>

<?php
} else {
    echo "<h2>Nie masz uprawnień do dodawania klientów</h2>";
}
?>
</div>
</body>
</html>