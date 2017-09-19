<?php include 'config.php';?><!--Inclusion du fichier de connection-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<?php include 'link.php';?>
	</head>
	<body>
		<?php
			if ($_GET['update']){
				include 'menu.php';
				$req = $bdd->query('SELECT * FROM voiture WHERE  id_voiture='.$_GET['update']);

				$donnees = $req->fetch(); 
				if(isset($_POST['modifier']))
				{
					$update = $_GET['update'];
					$q = $bdd->prepare('UPDATE voiture SET type_voiture = :type_voiture,marque=:marque,prix=:prix,couleur=:couleur,type_moteur=:type_moteur WHERE id_voiture=:id_voiture');

					$q->bindValue(':type_voiture', $_POST['type_voiture']);
					$q->bindValue('marque', $_POST['marque']);
					$q->bindValue('prix', $_POST['prix']);
					$q->bindValue('couleur', $_POST['couleur']);
					$q->bindValue('type_moteur', $_POST['type_moteur']);
					$q->bindValue(':id_voiture', $update, PDO::PARAM_INT);
					$q->execute();

					header('Location: liste_voiture.php');
					
				}
		?>
		<section class="templatemo-container light-gray-bg section-shadow-bottom">
			<div class="contact_form">
				<form method="post" action="" id="main_form">
					<fieldset>
						<legend><h1>Modifier une voiture</h1></legend>
						<table>
							<tr>
								<td><label>Type de voiture:</label></td> 
								<td><input class="form-control" type="text" name="type_voiture" id="type_voiture" value="<?php echo $donnees['type_voiture'];?>" /></td>
							</tr>
							<tr>	
								<td><label>Marque:</label></td>
								<td><input class="form-control" type="text" name="marque" id="marque" value="<?php echo $donnees['marque'];?>" /></td>
								</tr>
							<tr>
							<td><label>Prix:</label></td>
							 <td><input class="form-control" type="number" name="prix" id="prix" value="<?php echo $donnees['prix'];?>" /></td>
							 </tr>
							 <tr>
								<td><label>Couleur:</label></td> 
								<td><input class="form-control" type="text" name="couleur" id="couleur"  value="<?php echo $donnees['couleur'];?>"/></td>
							</tr>
							<tr>	
								<td><label>Type de moteur:</label></td> 
								<td><input class="form-control" type="text" name="type_moteur" id="type_moteur"  value="<?php echo $donnees['type_moteur'];?>"/></td>
							</tr>	
						</table>
					</fieldset>
					<div class="text-center">
						<a href="liste_voiture.php" class="btn btn-primary">Retour à la liste</a>
						<input type="submit" value="Modifier"  name="modifier" class="btn btn-primary"/>
					</div>
				</form>
			</div>
		</section>
		<footer>
			<?php 
				}
				else
					header('location: liste_client.php');
				include 'footer.php';
			?>
		</footer>
	</body>
</html>
