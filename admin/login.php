<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'link.php';?>

	<title>Connexion à Casse Auto</title>	
</head>
<body>
	<?php include 'footer.php';?>
	<section class="login_page-img templatemo-container light-gray-bg section-shadow-bottom">
		<div class="text-center">
			<img src="img/login-sm.jpg" class="img-circle" />
		</div>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<fieldset width="80">
				<legend> Connexion</legend>
					<div class="login">
						<div class="form-group">
							<label>Login:</label>
							<input type="text" name="login" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Mot de passe:</label>
							<input type="password" name="pass" class="form-control" required/>
						</div>
						<div class="text-center">
							<input type="submit" name="con" value="Connexion" class="btn-lg btn-primary"/><br/>
							<a href="../">Aller au site</a>
						</div>
					</div>
			</fieldset>
		</form>
			<div class="text-center">
				
			</div>
		<?php
			if(isset($_POST['pass'])){
				$login= $_POST['login'];
				//var_dump($login);
				$password= $_POST['pass'];
				//var_dump($password);

				$stmt=$bdd->prepare("SELECT username, password FROM users WHERE username=? AND password=?");
				$stmt->execute(array($login, sha1($password)));
				$user=$stmt->fetch(PDO::FETCH_ASSOC);
				//var_dump($user);
				if(!empty($user)){

					//L'utilisateur est connecté. demarrer une session et sauvegarder le status de l'utilisateur dedans
					$_SESSION['status']=true;
					$_SESSION['username']=$user['username'];
					//redirection via les sessions
					header('location: index.php');
				}
				else{
					echo '<div class="formTab"><br><h2 class="text-center label-danger">Login et/ou mot de passe incorrect(s)<br>Veuillez reessayer</h2></div>';
				}
			}
		?>
	</section>
</body>
</html>


