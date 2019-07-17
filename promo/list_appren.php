<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="projets.css">

  <title>liste des apprenants</title>
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

  <br><br>
  <h1>LISTE DES APPRENANTS</h1>
  <?php
  echo '<table class="table tables">
             <thead class="thead-dark">
                 <tr>
                 <th scope="col">CODE</th>
                 <th scope="col">NOM</th>
                 <th scope="col">PRENOM</th>
                 <th scope="col">DATE NAISSANCE</th>
                 <th scope="col">TELEPHONE</th>
                 <th scope="col">EMAIL</th>
                 <th scope="col">PROMO</th>
                 <th scope="col">STATUT</th>
                 </tr>
             </thead>
             <tbody>';

  $read = file("listappren.txt");
  for ($i = 0; $i < count($read); $i++) {
    $code = strtok($read[$i], ";");
    $nom = strtok(";");
    $prenom = strtok(";");
    $date = strtok(";");
    $tel = strtok(";");
    $email = strtok(";");
    $promo = strtok(";");
    $statut = strtok(";");


    echo '<tr>';
    echo '<td>' . $code . '</td>';
    echo '<td>' . $nom . '</td>';
    echo '<td>' . $prenom . '</td>';
    echo '<td>' . $date . '</td>';
    echo '<td>' . $tel . '</td>';
    echo '<td>' . $email . '</td>';
    echo '<td>' . $promo . '</td>';
    echo "<td> <a href='exclure.php?nom=$nom'><button class='btn btn-info'> $statut</button><a/> </td>";
    echo '</tr>';
  }


  echo '</tbody>
                  </table>';
  ?>

  <style>
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
      margin-right: -2%;
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