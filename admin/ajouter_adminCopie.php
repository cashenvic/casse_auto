<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php include 'link.php';?>
        <title>Ajouter un administrateur</title>
    </head>
    <body>
    	<?php
    		if(isset($_SESSION['status']) && isset ($_SESSION['username'])){
            	include 'menu.php';
        ?>
    	
	<?php
		//On verifie que le formulaire a ete envoye
		if(isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email']) and $_POST['username']!='')
		{
			//On enleve lechappement si get_magic_quotes_gpc est active
			if(get_magic_quotes_gpc())
			{
				$_POST['username'] = stripslashes($_POST['username']);
				$_POST['password'] = stripslashes($_POST['password']);
				$_POST['passverif'] = stripslashes($_POST['passverif']);
				$_POST['email'] = stripslashes($_POST['email']);
			}
			//On verifie si le mot de passe et celui de la verification sont identiques
			if($_POST['password']==$_POST['passverif'])
			{
				//On verifie si le mot de passe a 6 caracteres ou plus
				if(strlen($_POST['password'])>=6)
				{
					//On verifie si lemail est valide
					if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
					{
						//On echape les variables pour pouvoir les mettre dans une requette SQL
						$username = ($_POST['username']);
						$password =sha1($_POST['password']);
						$email =($_POST['email']);
						//On verifie sil ny a pas deja un utilisateur inscrit avec le pseudo choisis
						$dn =($bdd->query('select id from users where username="'.$username.'"'));
						$dn1=$dn->rowcount();
						if($dn1==0)
						{
							//On recupere le nombre dutilisateurs pour donner un identifiant a lutilisateur actuel
							$dn2 = ($bdd->query('select id from users'));
							$nbre=$dn2->rowcount();
							$id = $nbre+1;
							//On enregistre les informations dans la base de donnee
							if($bdd->query('insert into users(username, password, email, signup_date) values ('.$username.'", "'.$password.'", "'.$email.'", "'.time().'")'))
							{
								//Si ca a fonctionne, on naffiche pas le formulaire
								$form = false;
	?>
	<section class="templatemo-container light-gray-bg section-shadow-bottom">
		<div class="present">
			<div class="message">
				Vous avez bien &eacute;t&eacute; inscrit. Vous pouvez dor&eacute;navant vous connecter.<br />
				<a href="liste_admin.php">Voir la liste</a>
			</div>
		</div>
	</section>
<?php
					}
					else
					{
						//Sinon on dit quil y a eu une erreur
						$form = true;
						$message = 'Une erreur est survenue lors de l\'inscription.';
					}
				}
				else
				{
					//Sinon, on dit que le pseudo voulu est deja pris
					$form = true;
					$message = 'Un autre utilisateur utilise d&eacute;j&agrave; le nom d\'utilisateur que vous d&eacute;sirez utiliser.';
				}
			}
			else
			{
				//Sinon, on dit que lemail nest pas valide
				$form = true;
				$message = 'L\'email que vous avez entr&eacute; n\'est pas valide.';
			}
		}
		else
		{
			//Sinon, on dit que le mot de passe nest pas assez long
			$form = true;
			$message = 'Le mot de passe que vous avez entr&eacute; contient moins de 6 caract&egrave;res.';
		}
	}
	else
	{
		//Sinon, on dit que les mots de passes ne sont pas identiques
		$form = true;
		$message = 'Les mots de passe que vous avez entr&eacute; ne sont pas identiques.';
	}
}
else
{
	$form = true;
}
if($form)
{
	//On affiche un message sil y a lieu
	
	//On affiche le formulaire
?>
<section class="templatemo-container light-gray-bg section-shadow-bottom">
	<div class="content">
	    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<legend>
				<h1>Ajouter un Administrateur</h1>
			</legend>
	        <div class="center">
	        	<table>
	        		<tr>
		            	<td><label for="username">Nom d'utilisateur</label></td>
		            	<td><input class="form-control" type="text" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" required /></td>
		            </tr>
		            <tr>	
			            <td><label for="password">Mot de passe</label></td>
			            <td><input class="form-control" type="password" name="password" required /></td>
		             </tr>
		             <tr>
		             	<td>
		            	<label for="passverif">Mot de passe<span class="small">(vérification)</span></label></td>
		            	<td><input class="form-control" type="password" name="passverif" required/></td>
		            </tr>
		            <tr>	
			             <td><label for="email">Email</label></td>
			             <td><input class="form-control" type="text" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" /></td>
		             </tr>		            
	            </table>
	            <div class="text-center">
		            	<a class="btn btn-primary" href="liste_admin.php">Retour à la liste</a>
		            	<input type="reset" value="Effacer" class="btn btn-primary"/>
		            	<input type="submit" value="Enregistrer" class="btn btn-primary" />
		        </div>
			</div>
	    </form>
	   
<?php
 if(isset($message))
	{
		echo '<div class="formTab"><br><h2 class="text-center label-warning">'.$message.'</h2>';
	}
	echo '</div>	
</section>';
}
?>
	<footer>
		<?php
        	}
                else
                    header('location: liste_admin.php');
                include 'footer.php'; 
        ?>
	</footer>
	</body>
	 
</html>