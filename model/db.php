<?php
    $serveur="localhost";
    $port = "5432";
    $user="postgres";
    $pwd="root";
    $dbname="l3_iage_2024";

    $connexion = pg_connect("host=$serveur port=$port dbname=$dbname user=$user password=$pwd");

    if(!$connexion){
        echo "Erreur de connexion";
    }else{
       echo "succes";
    }
?>