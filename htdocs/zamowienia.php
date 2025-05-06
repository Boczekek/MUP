<h1>Zamówienia</h1>

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





<div class="center">
<form method="POST" id="myForm" class="dodawanie" action="zapiszOperacje.php">
<h2>Dodaj zamówienie</h2>
    
<input type="date" name="dataOperacji"><br>
<select name="klientID">
    
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

<h4>Pozycje:</h4>
<div id="myForm">
<select name="towar1ID" id="Item"><br>
    
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
<h3 id="dodajPozycje">Dodaj pozycję</h3>
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