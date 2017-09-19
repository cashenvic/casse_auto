<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<?php include 'link.php';?>
		<title>Ajouter un achat</title>
	</head>
	<body>

		<?php
			if(isset($_SESSION['status']) && isset ($_SESSION['username'])){
				include 'menu.php';
		?>
		<section class="templatemo-container light-gray-bg section-shadow-bottom">
			<div class="contact_form">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
					<fieldset>
						<legend>
							<h1>Enregistrer un achat</h1>
						</legend>
						<table>
							<tr>
								<td><label>Numéro client:</label></td>
								<td>
									<select name="id_client" class="form-control">
										<?php
											$reponse = $bdd->query('SELECT * FROM client');
											 
											while ($donnees = $reponse->fetch()){
											?>
											    <option value=" <?php echo $donnees['id_client']; ?> " > <?php echo $donnees['id_client'].' > <span class="text-uppercase">'.$donnees['nom_client'].'</span> '.$donnees['prenom_client']; ?></option>
											<?php
											}
											 
											$reponse->closeCursor();												 
										?>
										</select>
								 </td>
							</tr>
							<tr>
								<td><label>Numéro voiture:</label></td>
								 <td>
								 	<select name="id_voiture" class="form-control">
								 		<option value="">Selectionnez le numéro de la voiture</option>
										<?php
											$reponse = $bdd->query('SELECT * FROM voiture');
											 
											while ($donnees = $reponse->fetch())
											{
										?>
										    <option value="<?php echo $donnees['id_voiture']; ?>"><?php echo $donnees['id_voiture'].' > '.$donnees['marque']; ?></option>
										<?php
											}
											$reponse->closeCursor(); 
										?>
									</select>
								 </td>
							</tr>
							<tr>
								<td><label>Date achat:</label></td>
								<td><input type="date" name="date_achat" required class="form-control" placeholder="aaaa/mm/jj" /></td>
							</tr>
							<tr>	
								<td><label>Prix achat:</label></td>
								<td><input type="number" name="prix_achat" required class="form-control"/></td>
							</tr>
						</table>	 
							<div class="text-center">
								<a href="liste_achat.php" class="btn btn-primary">Retour à la liste</a>
								<input type="reset" value="Effacer" class="btn btn-primary"/>
								<input type="submit" value="Enregistrer" class="btn btn-primary"/>
							</div>
					</fieldset>
				</form>
				<?php
					/*
						ajoute un achat dans la base de données
					*/
					if(isset($_POST['id_client'])){
						$req = $bdd->prepare('INSERT INTO achat(id_client, id_voiture, date_achat, prix_achat) VALUES(:id_client,:id_voiture, :date_achat, :prix_achat)');
						$req->execute(array(
							'id_client' => $_POST['id_client'],
							'id_voiture' => $_POST['id_voiture'],
							'date_achat' => $_POST['date_achat'],
							'prix_achat' => $_POST['prix_achat']
							));

						echo '<div class="formTab"><br><h2 class="text-center label-success">L\'achat a été ajouté avec succès !</h2></div>';
						//echo 'Le jeu a bien été ajouté !';
						/*header('Location: liste_achat.php?Message');*/
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
