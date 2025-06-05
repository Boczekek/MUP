<!DOCTYPE html>
<html lang="pl-PL">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <script src="jquery.js"></script>
  <script type="text/javascript" src="app.js" defer></script>

    <title>Sklep "Enter"</title>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Sklep - kołki i gwoździe</h1>
  <p>Projekt na zaliczenie BD</p>
</div>

<div class="row.p" id="menu">
  <div class="col-md-12">
  <button type="button" link="home.php" class="link btn btn-outline-light">HOME</button>
  <button type="button" link="klienci.php" class="link btn btn-outline-light">KLIENCI</button>
  <button type="button" link="towary.php" class="link btn btn-outline-light">TOWARY</button>
  <button type="button" link="zamowienia.php" class="link btn btn-outline-light">ZAMÓWIENIA</button>
  
  <?PHP
        session_start();
        if(isset($_SESSION['login'])){?>

          <button type="button" link="logout.php" class="link btn btn-outline-light log">LOGOUT</button>
        <?PHP
        } 
        else{
          ?>
          <button type="button" link="logowanie.php" class="link btn btn-outline-light log">LOGOWANIE</button>
      <?PHP } ;
      ?>
  
  </div>
</div>

<div class="row.p" id="main">
  <div class="col-md-12">Witaj w sklepie z kołkami i gwoździami</div>
</div>

<div class="row.p" id="footer">
  <div>(c) Krystian Zając 2025</div>
  <div>All Right Reserved</div>
</div>
    
</body>
</html>