<script>
$(document).ready(function(){
    $("#myForm").submit(function(event){
        event.preventDefault();

        $.ajax({
            url: "dodaj_towar.php",
            type: "POST",
            data: $("#myForm").serialize(),
            cache: false,
            success: function (response) {
                $("#myTable").append(response);
                console.log(response);
            }
        });

    });
});
</script>

<h1>Towary</h1>
<div class="center">
    <div class="okno">
<table class="table table-hover" id="myTable">
    <thead>
        <tr>
            <th>Lp.</th
            ><th>Nazwa</th>
            <th>Cena</th>
            <th>Ilość</th>
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

    $zapytanie = "SELECT * FROM towary";

    $result = $conn->query($zapytanie);

    if ($result->num_rows > 0) {
        $licznik=1;
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$licznik++."</td><td>".$row["nazwa"]."</td><td>".$row["cena"]."</td><td>".$row["ilosc"]."</td>";

            if(isset($_SESSION['login'])){
                echo "<td><a class='del' href='deltowar.php?id=".$row["id"]."'>Usuń</a> | ";
                echo "<a class='edit' href='edittowar.php?id=".$row["id"]."'>Edtuj</a>";
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
</div>
</div>

<?php
if(isset($_SESSION['login'])){
?>

<div class="center">
    <form method="post" id="myForm" action="dodaj_towar.php" class="dodawanie">
        <h2>Dodawanie towarów</h2>
        <div class="form-group">
            <label for="nazwa">Nazwa:</label>
            <input type="text" class="form-control" id="nazwa" name="nazwa" placeholder="Wpisz nazwę" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="cena">Cena:</label>
            <input type="text" class="form-control" id="cena" name="cena" placeholder="Wpisz cenę" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="ilosc">Ilość:</label>
            <input type="number" class="form-control" id="ilosc" name="ilosc" placeholder="Wpisz ilość" autocomplete="off">
        </div>
        
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
</div>

<?php
} else {
    echo "<h2>Nie masz uprawnień do dodawania towarów</h2>";
}
?>