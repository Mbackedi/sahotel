  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="projets.css">

  <title>Modifier les données d'une promo</title>
</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">

      </div>
      <ul class="nav navbar-nav">
       
        <li><a href="listpromo.php">LISTE PROMO</a></li>
        <li><a href="ajout_promo.php">AJOUT PROMO</a></li>
        <li><a href="ajout_appren.php">AJOUT APPRENANTS</a></li>
        <li><a href="list_appren.php">LISTE DES APPRENNANT</a></li>
        <li><a href="modifierappren.php">MODIFIER APPRENANTS</a></li>
        <li><a href="modifierpromo.php">MODIFIER PROMO</a></li>
        <li><a href="listerpromo.php">LISTER PROMO</a></li>
        <li><a href="connect.php">DECONNEXION</a></li>

      </ul>

    </div>
  </nav>

  <form method="POST" action="" style="margin-left:25%;margin-top:-1%;">
    <p>
      <input type="text" name="code" value="<?php  if (isset($_GET['code'])){echo $_GET['code'];} ?>" placeholder="Code" required />
      <input type="text" name="nom" value="<?php if (isset($_GET['nom'])){echo $_GET['nom'];}?>" placeholder="Nom" required />
      <input type="texe" min=1 name="mois" value="<?php if (isset($_GET['mois'])){echo $_GET['mois'];} ?>" placeholder="Mois" required />
      <input type="number" min=1 name="annee" value="<?php if (isset($_GET['annee'])){echo $_GET['annee'];}?>" placeholder="annee" required />

      <button type="submit" name="valider" class="btn btn-primary">Modifier</button>
    </p>
  </form>

  <br><br>
  <h1>MODIFIER DONNEES</h1>
  <?php
  
  if (isset($_POST['valider'])) {
    $fichier = fopen('listpromo.txt', 'r');
    $tmp = fopen('tmp.txt', 'w');
    while (!feof($fichier)) {
      $ligne = fgets($fichier);
      $col = explode(';', $ligne);
      if ($_POST['code'] == $col[0]) {
        fwrite($tmp, $_POST['code'] . ";" . $_POST['nom'] . ";" . $_POST['mois'] . ";" . $_POST['annee'] . "\n");
      } else {
        fwrite($tmp, $ligne);
      }
    }
    fclose($fichier);
    fclose($tmp);

    $fichier = 'listpromo.txt';
    unlink($fichier);
    $tmp = 'tmp.txt';
    rename($tmp, 'listpromo.txt');
  }


  echo '<table class="table tables">
             <thead class="thead-dark">
                 <tr>
                 <th scope="col">CODE</th>
                 <th scope="col">NOM</th>
                 <th scope="col">MOIS</th>
                 <th scope="col">ANNEE</th>
                 <th scope="col">MODIFIER</th>
                 </tr>
             </thead>
             <tbody>';
  $read = file("listpromo.txt");
  for ($i = 0; $i < count($read); $i++) {
    $code = strtok($read[$i], ";");
    $nom = strtok(";");
    $mois = strtok(";");
    $annee = strtok(";");



    echo '<tr>';
    echo '<td>' . $code . '</td>';
    echo '<td>' . $nom . '</td>';
    echo '<td>' . $mois . '</td>';
    echo '<td>' . $annee . '</td>';
    echo " <td><a href='modifierpromo.php?code=$code&nom=$nom&mois=$mois&annee=$annee'> MODIFIER</a></td>";
    echo '</tr>';
  }


  echo '</tbody>
                  </table>';
  ?>

  <style>
    body {}



    .thead-dark {
      background-color: skyblue;
      width: 1%;
    }

    .thead {
      background-color: white;
      width: 1%;
    }

    .th {

      width: 1%;

    }

    .tm {
      background-color: skyblue;
      width: 1%;
    }

    table {
      border: 1px solid rgb(32, 53, 54);
      margin-left: 0%;
      margin-right: -20%;
      width: 80%;
      margin-top: -20%;
      height: 200px;
    }


    tfoot {
      background-color: #333;
      color: #fff;
    }

    h1 {
      margin-left: 35%;
      color: darkcyan;
      padding-top: -1%;
      padding-bottom: 1%;
    }

    .red {
      color: red !important;
    }
  </style>
</body>

</html>