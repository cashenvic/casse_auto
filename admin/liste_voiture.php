<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php include 'link.php';?>

        <title>Liste des voitures</title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['status']) && isset ($_SESSION['username'])){
                include 'menu.php';
                if(isset($_GET['supp'])){
                    $bdd->exec('DELETE FROM voiture WHERE id_voiture='.$_GET['supp']);
                }
        ?>
        <section class="templatemo-container light-gray-bg section-shadow-bottom">
            <div class="container-fluid">
                <h2>Liste des voitures</h2>
                <table class="resultTable table table-striped table-bordered table-responsive">
                    <tr>
                        <th>N° voiture</th>
                        <th>Type de voiture</th>
                  		<th>Marque</th>
                  		<th>Prix</th>
                  		<th>Couleur</th>
                  		<th>Type de moteur</th>
                  		<th colspan="2">Operation</th>
                    </tr>
                    <tr>
                        <?php
                            $req = $bdd->query('SELECT * FROM voiture');
                            // var_dump($req);
                            while ($donnees = $req->fetch())
                            {	
                                echo '<td class="text-center">'.$donnees['id_voiture'].'</td>';
                                echo '<td>'.$donnees['type_voiture'].'</td>';
                                echo '<td class="text-uppercase">'.$donnees['marque'].' </td>';
                                echo '<td>'.$donnees['prix'].' </td>';
                                echo '<td class="text-uppercase">'.$donnees['couleur'].' </td>';
                                echo '<td class="text-uppercase">'.$donnees['type_moteur'].' </td>';

                                echo '<td class="text-center"><a class="btn btn-warning" href="mise_jour_voiture.php?update='.$donnees['id_voiture'].'">Modifier</a></td>';
                                echo '<td class="text-center"><a class="btn btn-danger" href="liste_voiture.php?supp='.$donnees['id_voiture'].'" onclick="return(confirm(\'Etes-vous sûr de vouloir supprimer cette voiture ?\'));">Supprimer</a></td>';
                                echo '</tr>' ;
                            }
                        ?>
                    </tr> 
                </table></br>
                <div class="container text-center">
                    <a href="ajouter_voiture.php" class="btn btn-primary">Ajouter une voiture</a>
                </div>
            </div>
        </section>
        <footer>
            <?php
                }
                else
                    header('location: login.php');
                include 'footer.php';
            ?>  
        </footer> 
    </body>
    
</html> 