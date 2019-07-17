<?php
     $nom=$_GET['nom'];
    $fichier=fopen('listappren.txt', 'r');
    while(!feof($fichier)){
        $ligne=fgets($fichier);
        $col=explode(';', $ligne);
         if($nom==$col[0]){
             $li=$code[0].";".$nom[1].";".$prenom[2].";".$date[3].";".$email[4];
         }else{
             $li=$ligne;
         }
         $ligne1=$ligne1.$li;
    }
    fclose($fichier);

    $fichier=fopen('listappren.txt', 'w+');
    fwrite($fichier, $ligne1);
    fclose($fichier);

    
    header("location:modifier.php");
?>