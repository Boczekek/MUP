<?php
        include 'dbconfig.php';
        session_start();
        $id=$_GET['id'];
        $conn = new mysqli($server, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Błąd połączenia z BD: " . $conn->connect_error);
        }

        $zapytanie = "SELECT * FROM towary WHERE `towary`.`id` = $id LIMIT 1;";

        $result = $conn->query($zapytanie);

        if ($result->num_rows > 0) {
           
            while ($row = $result->fetch_assoc()) {  //$row["nazwa"]
               
          ?>

<h2>Edycja klientów</h2>

<form action="zapisz_edittowar.php" method="post">
        <div class="form-group">
            <input type="text" name="id" value="<?PHP echo $row['id'];?>" hidden><br>
            <label for="nazwa">Nazwa:</label>
            <input type="text" class="form-control" id="nazwa" name="nazwa" value="<?PHP echo $row['nazwa'];?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="cena">Cena:</label>
            <input type="text" class="form-control" id="cena" name="cena" value="<?PHP echo $row['cena'];?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="ilosc">Ilość:</label>
            <input type="number" class="form-control" id="ilosc" name="ilosc" value="<?PHP echo $row['ilosc'];?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="dostawca">Dostawca:</label>
            <input type="text" class="form-control" id="dostawca" name="dostawca" value="<?PHP echo $row['dostawca'];?>" autocomplete="off">
        </div>
        
        <button type="submit" class="btn btn-primary">Popraw</button>
    </form>

<?PHP
            };
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>