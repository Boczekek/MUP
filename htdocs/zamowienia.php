<script>
$(document).ready(function(){
    $("#myForm").submit(function(event){
        event.preventDefault();

        $.ajax({
            url: "zapiszOperacje.php",
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

<h1>Zamówienia</h1>

<div class="center">
    <div class="okno">
<table class="table table-hover table-sm" id="myTable">
<thead>
        <tr>
           
            <th>Nazwa firmy</th>
            <th>Nazwa towaru</th>
            <th>data</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'dbconfig.php';
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

        $zapytanie = "SELECT `klienci`.`nazwa` AS 'nazwaKlienta', `towary`.`nazwa` AS 'nazwaTowaru', `operacje`.`data` FROM klienci, operacje, towary WHERE `operacje`.`idk`=`klienci`.`id` AND `operacje`.`idt`=`towary`.`id`";

        $result = $conn->query($zapytanie);

        if ($result->num_rows > 0) {
           
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["nazwaKlienta"] . "</td><td>" . $row["nazwaTowaru"] . "</td><td>" . $row["data"] . "</td>";
                echo "<td></tr>\n";
                
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




<div class="center">
<form method="post" id="myForm" action="zapiszOperacje.php" class="dodawanie">
<h2>Dodaj zamówienie</h2>
    
Data: <input type="date" name="dataOperacji"><br>
Klient: <select name="klientID">
    
    <?php
        include 'dbconfig.php';
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

        $zapytanie = "SELECT id,nazwa,adres FROM klienci";

        $result = $conn->query($zapytanie);

        if ($result->num_rows > 0) {
            $licznik = 1;
            while ($row = $result->fetch_assoc()) {
              echo "<option value='".$row['id']."'>".$row['nazwa']." [".$row['adres']."]</option>\n"; 
            }
        };


        $conn->close();
        ?>



</select>

<div id="myForm">
Towar: <select name="towar1ID" id="Item"><br>
    
    <?php
        include 'dbconfig.php';
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

        $zapytanie = "SELECT id,nazwa FROM towary";

        $result = $conn->query($zapytanie);

        if ($result->num_rows > 0) {
            $licznik = 1;
            while ($row = $result->fetch_assoc()) {
              echo "<option value='".$row['id']."'>".$row['nazwa']."</option>\n"; 
            }
        };

        $conn->close();
        ?>



</select></div>
<br>
<h4 id="dodajPozycje">[ Dodaj pozycję ]</h4>
<br><br><button type="submit" class="btn btn-primary">zatwierdź</button>
</form>
    </div>


<script>
    document.getElementById("dodajPozycje").addEventListener("click",addItem);
    const towar = document.getElementById("Item");
    
    function addItem(){
        const klon = towar.cloneNode(true); 
        document.getElementById("myForm").innerHTML()
        document.getElementById("myForm").append(klon); 
     
    }

</script>