<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<?php include 'link.php';?>
	</head>
	<body>
		<?php
			include 'menu.php';
			if ($_GET['update']){
				$bdd = new PDO('mysql:host=localhost;dbname=casse_auto', 'root', '');
				$req = $bdd->query('SELECT * FROM client WHERE  id_client='.$_GET['update']);

				$donnees = $req->fetch(); 
				if(isset($_POST['modifier'])){
					$update = $_GET['update'];
					$q = $bdd->prepare('UPDATE client SET email_client = :email_client,nom_client=:nom_client,prenom_client=:prenom_client,tel_client=:tel_client WHERE id_client=:id_client');

					$q->bindValue(':email_client', $_POST['email_client']);
					$q->bindValue('nom_client', $_POST['nom_client']);
					$q->bindValue('prenom_client', $_POST['prenom_client']);
					$q->bindValue('tel_client', $_POST['tel_client']);
					//$q->bindValue('type_moteur', $_POST['type_moteur']);
					$q->bindValue(':id_client', $update, PDO::PARAM_INT);
					$q->execute();

					header('Location: liste_client.php');
					
				}

		?>
		<section class="templatemo-container light-gray-bg section-shadow-bottom">
			<div class="contact_form">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" id="main_form">
					<fieldset>
						<legend><h1>Modifier un client</h1></legend>
						<table>
							<tr>
								<td><label >Email client </label>:</td> 
								<td><input type="email" name="email_client" id="email_client" value="<?php echo $donnees['email_client'];?>" class="form-control"/></td>
							</tr>
							<tr>	
								<td><label>Nom client </label>: </td>
								<td><input type="text" name="nom_client" id="nom_client" value="<?php echo $donnees['nom_client'];?>" class="form-control"/></td>
								</tr>
							<tr>
								<td><label>Prenom client </label>:</td>
								<td><input type="text" name="prenom_client" id="prenom_client" value="<?php echo $donnees['prenom_client'];?>" class="form-control"/></td>
							 </tr>
							 <tr>
								<td><label>Telephone client</label> :</td> 
								<td><input type="number" name="tel_client" id="tel_client"  value="<?php echo $donnees['tel_client'];?>" class="form-control"/></td>
							</tr>	
						</table>
					</fieldset>
					<div class="text-center">
						<a href="liste_client.php" class="btn btn-primary">Retour à la liste</a>
						<input class="btn btn-primary" type="submit" value="Modifier"  name="modifier"/>
					</div>
				</form>
			</div>
		</section>
		<?php
			}
			else
				header('location: liste_client.php');
			include 'footer.php';
		?>
	</body>
</html>
