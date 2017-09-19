<?php include 'config.php';?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<?php include 'link.php';?>
	<body>
		<?php
			include 'menu.php';
			if ($_GET['update']){
				$req = $bdd->query('SELECT * FROM achat WHERE  id_achat='.$_GET['update']);
		        $donnees = $req->fetch(); 
				if(isset($_POST['modifier']))
				{
					$update = $_GET['update'];
					$q = $bdd->prepare('UPDATE achat SET id_client = :id_client, id_voiture = :id_voiture, date_achat = :date_achat, prix_achat = :prix_achat WHERE id_achat = :id_achat');

					$q->bindValue(':id_client', $_POST['id_client']);
					$q->bindValue('id_voiture', $_POST['id_voiture']);
					$q->bindValue('date_achat', $_POST['date_achat']);
					$q->bindValue('prix_achat', $_POST['prix_achat']);
					$q->bindValue(':id_achat', $update, PDO::PARAM_INT);
					$q->execute();

				    header('Location: liste_achat.php');			
				}
		?>
		<section class="templatemo-container light-gray-bg section-shadow-bottom">
			<div class="contact_form">
				<form method="post" action="" id="main_form">
					<fieldset>
						<legend>
							<h1>Modifier un achat</h1>
						</legend>
						<table>
						<!-- <tr>
							<td><label  >Numéro achat:</label></td>
							<td><input class="form-control" type="number" name="id_achat" value="<?php echo $donnees['id_achat'];?>" disabled/></td>
						</tr> -->
						<tr>
							<td><label  >Numéro client:</label></td>
							<td><input class="form-control" type="number" name="id_client" value="<?php echo $donnees['id_client'];?>" required/></td>
						</tr>

						<tr>
							<td><label>Numéro voiture:</label></td>
							 <td><input class="form-control" type="number" name="id_voiture" value="<?php echo $donnees['id_voiture'];?>" required/></td>
						 </tr>

						<tr>
							<td><label>Date achat:</label></td>
							<td><input class="form-control" type="txt" name="date_achat" value="<?php echo $donnees['date_achat'];?>" required/></td>
						</tr>
						<tr>
							<td><label>Prix achat:</label></td>
							 <td><input class="form-control" type="text" name="prix_achat" value="<?php echo $donnees['prix_achat'];?>" min="500000" required/></td>
						</tr>
						</table>
					</fieldset>
					<div class="text-center">
						<a href="liste_achat.php" class="btn btn-primary">Retour à la liste</a>
						<input class="btn btn-primary" type="submit" value="Modifier"  name="modifier"/>
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
