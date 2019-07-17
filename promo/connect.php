<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <form action="" method="post">
        <div class="form-group row col-5 col-md-push-4 offset-md-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Login</label>
            <div class="col">
                <input type="text" required="required" name="login" class="form-control" id="inputEmail3" placeholder="votre Login">
            </div>
        </div>
        <div class="form-group row col-5 col-md-push-4 offset-md-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col">
                <input type="text" required="required" min=1 name="password" class="form-control" id="inputPassword3" placeholder="Votre mot de pass">
            </div>
        </div>

        <div class="form-group row col-6 col-md-push-4 offset-md-5">
            <div class="col">
                <button type="submit" name="valider" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>

    </form>

    <?php
    $conn = false;
    $fichier = fopen("connect.txt", "r");
    while (!feof($fichier)) {
        $ligne = fgets($fichier);
        $col = explode(";", $ligne);
        if (isset($_POST['valider'])) {
            $login = $_POST['login'];
            $mdp = $_POST['password'];
            if ($col[0] == $login && $col[1] == $mdp) {
                $conn = true;
            }
        }
    }
    fclose($fichier);
    if (!$conn) { } else {
        header("location:list_appren.php");
    }

    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>