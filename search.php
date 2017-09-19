<?php

/*

    MARQUE, TYPE MOTEUR, PRIX MIN et PRIX MAX renseignes

*/
    if(isset($_POST['marque_voiture']) && isset($_POST['type_moteur']) && ($_POST['prix_min']!="") && ($_POST['prix_max']!="")) {

        require 'connect.php';

        $marque = $_POST['marque_voiture'];
        $type_moteur = $_POST['type_moteur'];
        $prix_min = $_POST['prix_min'];
        $prix_max = $_POST['prix_max'];

        $req = $bdd->prepare('SELECT *  FROM voiture WHERE marque like ? and type_moteur LIKE ? and prix >= ? and prix <= ?;');
        $req->execute(array($marque, $type_moteur, $prix_min, $prix_max));
            // var_dump($req);
        echo '<h3>'.$req->rowCount().' resultat(s) touvé(s) pour "'.$marque.'" de type "'.$type_moteur.'" entre "'.$prix_min.'" et "'.$prix_max.'"</h3><br><br>';
        
        include 'tableau.php';
    }
/*

   MARQUE, TYPE MOTEUR et PRIX MAX renseignes

*/

    elseif(isset($_POST['marque_voiture']) && isset($_POST['type_moteur']) && ($_POST['prix_max']!="" )) {

        include 'connect.php';

        $marque = $_POST['marque_voiture'];
        $type_moteur = $_POST['type_moteur'];
        $prix_max = $_POST['prix_max'];

        $req = $bdd->prepare('SELECT *  FROM voiture WHERE marque like ? and type_moteur LIKE ? and prix <= ?;');
        $req->execute(array($marque, $type_moteur, $prix_max));
            // var_dump($req);
        echo '<h3>'.$req->rowCount().' resultat(s) touvé(s) pour "'.$marque.'" de type "'.$type_moteur.'" à moins de "'.$prix_max.'"</h3><br><br>';
        
        include 'tableau.php';
    }

/*

    MARQUE, TYPE MOTEUR et PRIX MIN renseignes

*/

    elseif(isset($_POST['marque_voiture']) && isset($_POST['type_moteur']) && ($_POST['prix_min']!="")) {

        require 'connect.php';

        $marque=$_POST['marque_voiture'];
        $type_moteur=$_POST['type_moteur'];
        $prix_min=$_POST['prix_min'];

        $req = $bdd->prepare('SELECT *  FROM voiture WHERE marque like ? and type_moteur LIKE ? and prix >= ?;');
        $req->execute(array($marque, $type_moteur, $prix_min));
            // var_dump($req);
        echo '<h3>'.$req->rowCount().' resultat(s) touvé(s) pour "'.$marque.'" de type "'.$type_moteur.'" à plus de "'.$prix_min.'"</h3><br><br>';
       
        include 'tableau.php';
    }
/*

    MARQUE et TYPE MOTEUR renseignes

*/
    elseif(isset($_POST['marque_voiture']) && isset($_POST['type_moteur'])){

        require 'connect.php';

        $marque=$_POST['marque_voiture'];
        $type_moteur=$_POST['type_moteur'];

        $req = $bdd->prepare('SELECT *  FROM voiture WHERE marque like ? and type_moteur LIKE ?;');
        $req->execute(array($marque, $type_moteur));
        /*$marque2="";
        for($i=0; $i<$marque.strlen(); $i++){
            $marque2="%".$marque[$i]."%";
            // var_dump($req);
        }*/
        echo '<h3>'.$req->rowCount().' resultat(s) touvé(s) pour "'.$marque.'" de type "'.$type_moteur.'"</h3><br><br>';
       
            include 'tableau.php';
    }


