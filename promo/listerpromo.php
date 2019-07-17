<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="projets.css">

    <title>AJOUTER APPREN</title>
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


    <h1>LISTER APPRENANTS</h1>




    <?php

    echo ' <form id="" action="" method="POST" >';
    echo ' <select name="promo">';
    $fiche = fopen('listpromo.txt', 'r');
    while (!feof($fiche)) {
        $ligne = fgets($fiche);
        $col = explode(';', $ligne);
        echo " <option value=" . $col[1] . ">" . $col[1] . "</option>";
    }
    fclose($fiche);
    echo '<input type="submit" value="Lister" id="lister" name="ajout_promo">';
    echo "</select>";
    echo "</form>";
    $vf = false;
    if (isset($_POST['ajout_promo'])) {

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

            if ($promo == $_POST['promo']) {
                $vf = true;
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
        }


        echo '</tbody>
        </table>';
    }

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
            background-color: ;
            width: 1%;

        }


        tfoot {
            background-color: #333;
            color: #fff;
        }

        h1 {
            margin-left: 35%;
            color: darkcyan;

            margin-top: 5%;
        }

        .red {
            color: red !important;
        }

        form {
            margin-top: 0%;
            width: 30%;
            margin-left: 36%;
            height: 50px;
        }
    </style>


    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>


</html>