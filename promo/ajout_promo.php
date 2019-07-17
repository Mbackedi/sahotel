<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>AJOUTER PROMO</title>
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


    <h1>AJOUTER PROMO</h1>

    <form action="" method="post">
        <div class="form-group row col-6 col-md-push-4 offset-md-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
            <div class="col">
                <input type="text" name="code" class="form-control" id="inputEmail3" placeholder="Code">
            </div>
        </div>
        <div class="form-group row col-6 col-md-push-4 offset-md-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
            <div class="col">
                <input type="text" required="required" min=1 name="nom" class="form-control" id="inputPassword3" placeholder="Nom">
            </div>
        </div>

        <div class="form-group row col-6 col-md-push-4 offset-md-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
            <div class="col">
                <select name="mois" class=form-control>
                    <option value="Janvier">Janvier</option>
                    <option value="Fevrier">Fevrier</option>
                    <option value="Mars">Mars</option>
                    <option value="Avril">Avril</option>
                    <option value="Mai">Mai</option>
                    <option value="Juin">Juin</option>
                    <option value="Juillet">Juillet</option>
                    <option value="Aout">Aout</option>
                    <option value="Septembre">Septembre</option>
                    <option value="Octobre">Octobre</option>
                    <option value="Novembre">Novembre</option>
                    <option value="Decembre">Decembre</option>

                </select>
            </div>
        </div>

        <div class="form-group row col-6 col-md-push-4 offset-md-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
            <div class="col">
                <select name="annee" class=form-control>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>

                </select>
            </div>
        </div>


        <div class="form-group row col-6 col-md-push-4 offset-md-3">
            <div class="col">
                <button type="submit" name="valider" class="btn btn-primary">AJOUTER</button>
            </div>
        </div>



    </form>


    <?php
    $ajou = false;
    if (isset($_POST['valider'])) {
        $code = $_POST['code'];
        $fichier = fopen('listpromo.txt', 'r');
        while (!feof($fichier)) {
            $ligne = fgets($fichier);
            $col = explode(';', $ligne);
            if ($code == $col[0]) {
                $ajou = true;
            }
        }
        fclose($fichier);

        $codes = intval($col[0]) + 1;
        $nom = $_POST['nom'];
        $mois = $_POST['mois'];
        $annee = $_POST['annee'];


        if ($ajou == true) { } else {
            $fichier = fopen('listpromo.txt', 'a+');
            fwrite($fichier, $codes . ";" . $nom . ";" . $mois . ";" . $annee . "\n");
            fclose($fichier);
        }
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