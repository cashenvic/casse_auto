<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<?php include 'link.php';?>
		<title>Ajouter une voiture</title>
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
						<legend><h1>Enregistrer une voiture</h1></legend>
						<table>
                            <tr>
								<td><label class="control-label" for="Nom">Type de voiture:</label></td>
								<td><input type="text" name="type_voiture" class="form-control" required /></td>
							</tr>
							<tr>
								<td><label class="control-label">Marque de voiture:</label></td>
								<td><input type="text" name="marque" class="form-control" required /></td>
							</tr>
							<tr>	 
								<td><label class="control-label">Prix:</label></td>
								<td><input type="number" name="prix" class="form-control" required /></td>
							</tr>
							<tr>	 
								<td><label class="control-label">Couleur:</label></td>
								<td><input type="text" name="couleur" class="form-control" required /></td>
								</tr>
							<tr class="form-group">
								<td><label class="control-label">Type de moteur:</label></td>
								<td>
									<select class="form-control" name="type_moteur" required>
                                        <option value="">-- Type de moteur -- </option>
                                        <option value="diesel">Diesel</option>
                                        <option value="essence">Essence</option>
                                        <option value="electrique">Electrique</option>
                                        <option value="hybride">Hybride</option>
                                    </select> 
								</td>
							</tr>						
						</table>
						<div class="text-center">
							<a href="liste_voiture.php" class="btn btn-primary">Retour a la liste</a>
                         	<input type="reset" value="Effacer" class="btn btn-primary"/>
							<input type="submit" value="Enregistrer" class="btn btn-primary"/>		
						</div>
					</fieldset>
				</form>
				<?php
					/*
						Traite l'ajout de nouvelles voitures
					*/
					if(isset($_POST['type_voiture'])){
						$req = $bdd->prepare('INSERT INTO voiture(type_voiture, marque, prix, couleur, type_moteur) VALUES(:type_voiture, :marque,:prix, :couleur, :type_moteur)');
						$req->execute(array(
							'type_voiture' => $_POST['type_voiture'],
							'marque' => $_POST['marque'],
							'prix' => $_POST['prix'],
							'couleur' => $_POST['couleur'],
							'type_moteur' => $_POST['type_moteur']
							));

						echo '<div class="formTab"><br><h2 class="text-center label-success">La voiture a été ajoutée avec succès !</h2></div>';
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
