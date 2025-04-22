<h4>Zamówienia</h4>

<table class="table table-hover table-sm">
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






<form method="POST" action="zapiszOperacje.php" id="myForm">
    
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
<select name="towar1ID" id="Item">
    
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



</select><br>
<h3 id="dodajPozycje">Dodaj pozycję</h3>
<br><br><button type="submit">zatwierdź</button>
</for>


<script>
    document.getElementById("dodajPozycje").addEventListener("click",addItem);
    const towar = document.getElementById("Item");
    
    function addItem(){
        document.getElementById("myForm").appendChild(towar);
     
    }

</script>