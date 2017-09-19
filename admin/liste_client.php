<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php include 'link.php';?>
        
        <title>Liste des clients</title>
    </head>
    <body>

        <?php
          include 'menu.php';

            if(isset($_SESSION['status']) && isset ($_SESSION['username'])){
                $bdd = new PDO('mysql:host=localhost;dbname=casse_auto', 'root', '');
                if(isset($_GET['supp'])){
                    $bdd->exec('DELETE FROM client WHERE id_clent='.$_GET['supp']);
                }
        ?>
        <section class="templatemo-container light-gray-bg section-shadow-bottom">
            <div class="container-fluid">
                    
                <h2>Liste des clients</h2>
                <table class="resultTable table table-striped table-bordered table-responsive">
                        <tr>
                            <th>N° client</th>
                            <th>Email client</th>
                            <th>Nom</th>
                      		<th>Premon</th>
                      		<th>Telephone</th>
                            <th colspan="2">Operation</th>
                        </tr>
                    <tbody>
                        <?php
                            $req = $bdd->query('SELECT * FROM client');
                            // var_dump($req);
                             while ($donnees = $req->fetch()){
                                echo '<td class="text-center">'.$donnees['id_client'].'</td>';	
                                echo '<td> '.$donnees['email_client'].'</td>';
                                echo '<td class="text-uppercase">'.$donnees['nom_client'].' </td>';
                                echo '<td>'.$donnees['prenom_client'].' </td>';
                                echo '<td>'.$donnees['tel_client'].' </td>';
                             
                                echo '<td class="text-center"><a class="btn btn-warning" href="mis_jour_client.php?update='.$donnees['id_client'].'"> Modifier</a></td>';
                                echo '<td class="text-center"> <a class="btn btn-danger" href="liste_client.php?supp='.$donnees['id_client'].'" onclick="return(confirm(\'Etes-vous sûr de vouloir supprimer ce client ?\'));">Supprimer</a></td>';
                                echo '</tr>' ;
                            }
                        ?>
                    </tbody> 
                </table></br>

                <div class="container text-center">
                    <a href="ajouter_client.php" class="btn btn-primary">Ajouter un client</a>
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


