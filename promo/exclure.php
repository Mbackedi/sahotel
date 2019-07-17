<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="projets.css">

    <title>Liste des apprennants</title>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">

            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="accueil.php">ACCUEIL</a></li>
                <li><a href="listpromo.php">LISTE PROMO</a></li>
                <li><a href="ajout_promo.php">AJOUT PROMO</a></li>
                <li><a href="ajout_appren.php">AJOUT APPRENANTS</a></li>
                <li><a href="list_appren.php">LISTE DES APPRENNANT</a></li>
                <li><a href="modifierappren.php">MODIFIER APPRENANTS</a></li>
                <li><a href="modifierpromo.php">MODIFIER PROMO</a></li>

            </ul>

        </div>
    </nav>

    <?php
     echo $_GET['nom'];
    $fichier = fopen('listappren.txt', 'r');
    $tmp = fopen('tmp.txt', 'w+');
    while (!feof($fichier)) {
        $ligne = fgets($fichier);
        $col = explode(';', $ligne);
        $statut = "";
        
        if ($col[1] == $_GET['nom'] /*  && $_GET['nom'] != 'DIOP' */ ) {
            if ($col[7] == "exclu\n"  || $col[7] == "exclu" ) {
                $statut = "inclu";
            } else {
                $statut = "exclu";
            }
            $line = $col[0] . ";" . $col[1] . ";" . $col[2] . ";" . $col[3] . ";" . $col[4] . ";" . $col[5] . ";" . $col[6] . ";" . $statut . "\n";
        echo $line;
        
        } else {
            $line = $ligne;
        }
        $la = $la.$line;
    }

    fwrite($tmp, trim($la));
    fclose($fichier);
    fclose($tmp);

    $fichier = 'listappren.txt';
    unlink($fichier);
    $tmp = 'tmp.txt';
    rename($tmp, 'listappren.txt');

     header("location:list_appren.php"); 

    ?>

</body>

</html>