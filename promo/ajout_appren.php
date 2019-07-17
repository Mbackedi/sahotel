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


    <h1>AJOUTER APPRENNANT</h1>

    <form action="" method="post">
        <div class="form-group row col-6 col-md-push-4 offset-md-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
            <div class="col">
                <input type="text" name="code" class="form-control" id="inputEmail3" placeholder="Code" >
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
                <input type="text" required="required" min=1 name="prenom" class="form-control" id="inputPassword3" placeholder="Prenom">
            </div>
        </div>

        <div class="form-group row col-6 col-md-push-4 offset-md-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
            <div class="col">
                <input type="date" required="required" min=1 name="date" class="form-control" id="inputPassword3" placeholder="Date Naiss">
            </div>
        </div>

        <div class="form-group row col-6 col-md-push-4 offset-md-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
            <div class="col">
                <input type="text" required="required" min=1 name="tel" class="form-control" id="inputPassword3" placeholder="Numero Tel">
            </div>
        </div>

        <div class="form-group row col-6 col-md-push-4 offset-md-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
            <div class="col">
                <input type="text" required="required" min=1 name="email" class="form-control" id="inputPassword3" placeholder="Mail">
            </div>
        </div>

        <div class="form-group row col-6 col-md-push-4 offset-md-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
            <div class="col">

                <?php
                echo ' <select name="ajoutpromo" class=form-control>';
                $fichier = fopen('listpromo.txt', 'r');
                while (!feof($fichier)) {
                    $ligne = fgets($fichier);
                    $col = explode(';', $ligne);
                    echo "<option value=" . $col[1] . ">" . $col[1] . "</option>";
                }
                fclose($fichier);
                echo ' </select>';
                ?>

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
        $fichier = fopen('listappren.txt', 'r');
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
        $prenom = $_POST['prenom'];
        $date = $_POST['date'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $promo = $_POST['ajoutpromo'];
        $statut = "exclu";

        if ($ajou == true) { } else {
            $fichier = fopen('listappren.txt', 'a+');
            fwrite($fichier, "\n" . $codes . ";"  . $nom . ";" . $prenom . ";" . $date . ";" . $tel . ";" . $email . ";" . $promo . ";" . $statut);
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