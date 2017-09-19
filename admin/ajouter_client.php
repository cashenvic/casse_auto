<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<?php include 'link.php';?>
	</head>
	<body>
        <?php
        	if(isset($_SESSION['status']) && isset ($_SESSION['username'])){
 			 	include 'menu.php';
 	    ?>
 	    <section class="templatemo-container light-gray-bg section-shadow-bottom">
			<div class="contact_form">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
					<legend><h1>Enregistrer un client</h1></legend>
					<table>
						<tr>
							<td><label>Nom:</label></td> 
							<td><input type="text" name="nom_client" required class="form-control" /></td>
						</tr>
						<tr>
							<td><label>Prenom:</label></td> 
							<td><input type="text" name="prenom_client" required class="form-control" /></td>
						</tr>
						<tr>
							<td><label>Telephone:</label></td>
							<td><input type="text" name="tel_client" required class="form-control" /></td>
	                    </tr>
						<tr>
							<td><label for="Nom">Email:</label></td> 
							<td><input type="Email" name="email_client" class="form-control" /></td>
						</tr>
					</table>
					<div class="text-center"> 
						<a href="liste_client.php" class="btn btn-primary">Retour a la liste</a>
						<input type="reset" value="Effacer" class="btn btn-primary" />
						<input type="submit" value="Enregistrer" class="btn btn-primary" />
					</div>
	 			</form>
	 			<?php
					/*
						Traite l'ajout de nouvelles voitures
					*/
					if(isset($_POST['email_client'])){
						$req = $bdd->prepare('INSERT INTO client(email_client, nom_client, prenom_client, tel_client) VALUES(:email_client, :nom_client,:prenom_client, :tel_client )');
						$req->execute(array(
							'email_client' => $_POST['email_client'],
							'nom_client' => $_POST['nom_client'],
							'prenom_client' => $_POST['prenom_client'],
							'tel_client' => $_POST['tel_client']							
							));

						echo '<div class="formTab"><br><h2 class="text-center label-success">Le client a ete ajouté avec succes !</h2></div>';
						//header('Location: ajouter_voiture.php');
					}
				?>
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
