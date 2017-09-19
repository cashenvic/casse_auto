<?php include('config.php'); ?>
<!DOCTYPE html>
<html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php include 'link.php';?>

        <title>Liste des administrateurs</title>
    </head>
    <body>
        <?php
            include 'menu.php';
            if(isset($_SESSION['status']) && isset ($_SESSION['username'])){
        ?>

    	<section class="templatemo-container light-gray-bg section-shadow-bottom">
            <div class="container-fluid">
                <h2>Listes des administrateurs</h2>
                <table class="resultTable table table-striped table-bordered table-responsive">
                    <tr>
                    	<th>Nom d'utilisateur</th>
                    	<th>Email</th>
                    </tr>
                    <?php
                        $req =$bdd->query ('select id, username, email from users');
                        while($dnn = $req->fetch()){
                    ?>
                        	<tr>
                            	<td class="left"><?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8');?></td>
                            	<td class="left"><?php echo htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8');?></td>
                            </tr>
                    <?php
                        }
                    ?>
                </table>
    		</div>
            <div class="container text-center">
                <a href="ajouter_admin.php" class="btn btn-primary">Ajouter un administrateur</a>
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