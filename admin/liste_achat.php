<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php include 'link.php';?>

        <title>Liste des achats</title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['status']) && isset ($_SESSION['username'])){
                include 'menu.php';
                if(isset($_GET['supp'])){$bdd->exec('DELETE FROM achat WHERE id_achat='.$_GET['supp']);}
        ?>
        <section class="templatemo-container light-gray-bg section-shadow-bottom">
            <div class="container-fluid">
                <h2>Liste des achats</h2>
                
                <table class="table table-striped table-bordered table-responsive resultTable" >
                    <tr>
                        <th>N° achat</th>
                		<th>N° client</th>
                		<th>N° voiture</th>
                		<th>Date d'achat</th>
                		<th>Prix d'achat</th>
                		<th colspan="2">Operation</th>
                    </tr>
               
                <?php
                    $req = $bdd->query('SELECT * FROM achat a, client c, voiture v where a.id_voiture=v.id_voiture and a.id_client=c.id_client');
                    // var_dump($req);
                    while ($donnees = $req->fetch()){	
                        echo '<td class="text-center">'.$donnees['id_achat'].'</td>';
                        echo '<td>'.$donnees['id_client'].'- '.$donnees['nom_client'].' '.$donnees['prenom_client'].'</td>';
                        echo '<td>'.$donnees['id_voiture'].'- '.$donnees['marque'].' </td>';
                        echo '<td>'.$donnees['date_achat'].' </td>';
                        echo '<td>'.$donnees['prix_achat'].' </td>';
                        echo '<td class="text-center"><a class="btn btn-warning" href="mise_jour_achat.php?update='.$donnees['id_achat'].'"> Modifier</a></td>';
                        echo '<td class="text-center"><a class="btn btn-danger" href="liste_achat.php?supp='.$donnees['id_achat'].'" onclick="return(confirm(\'Etes-vous sûr de vouloir supprimer cet achat ?\'));">Supprimer</a></td>';
                        echo '</tr>' ;
                    }
                ?>
                </table>
                <div class="container text-center">
                    <a href="ajouter_achat.php" class="btn btn-primary">Ajouter un achat</a>
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

