<?php
try {
		
// Connexion à la base de données MySQL
	$username="root";
	$password="";
	$dsn="mysql:host=localhost; dbname=contacts; charset=utf8";
	$db = new PDO($dsn, $username, $password);

	//affichage detaille des eurreurs
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (isset($_POST['login']) AND isset($_POST['password']) AND isset($_POST['ajouter'])){
	//Creer et preparer des requetes SQL
	$req = $db->query("select * from authentification  ");

	if ($req) {
        if (isset($_POST['ajouter']) )
		{
           if($_POST['login']=='')
			{?>

				<script>
					alert("NOM D'UTILISATEUR: EST OBLIGATOIRE!!!");
				</script>

				<?php
					echo "<body onLoad='alert('NOM D'UTILISATEUR: EST OBLIGATOIRE!!!')'> ";
					echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			} elseif($_POST['password']=='')
			 {?>

				<script>
					alert("MOT DE PASSE: EST OBLIGATOIRE!!!");
				</script>
					
				<?php
				echo "<body onLoad='alert('MOT DE PASSE: EST OBLIGATOIRE!!!')'> ";
				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			} elseif($_POST['login']=="OUS" AND $_POST['password']=="OUS"){
				header('Location:accueil.php');
				
					}else{
					?>
				<script>
				alert("LOGIN OU MOT DE PASSE INCORRECT!!!");
				</script>

					<?php
				}

	//Fermer le curseur pour executer une autre requˆete
	$req->closeCursor();
	// pour fermer la connexion
	$db = null;
	
}
}
}

} catch (PDOException $e) {
	
	die("Eurreure" .$e->getMessage());
}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulaire</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="script.js"></script>



						<?php
						
							 ?>
	<center>
		<br>
    <fieldset>	
    	<h1 id="authentification" class="authentification">AUTHENTIFICATION</h1>
	<form id="formulaire" method="post" action="">
		<div>
		 <label for="login"> NOM D'UTILISATEUR: </label>
		 <input id="login" type="text" name="login" placeholder="----ENTRER VOTRE NON D'UTILISATEUR ---------------"/>
		</div><br>
		<div>
		 <label for="password"> MOT DE PASSE: </label>
		  <input id="password" type="text" name="password" placeholder="---------ENTRER VOTRE MOT DE PASSE-----------------"/>
		</div>
		<div><br><br><br>
		  <input type="submit" value="connexion" name="ajouter"/>
		</div>
	</form><br>
	<a href="">Mot de passe oublie ?</a>
	<br><br><br><br>
  </fieldset>	
  </center>
</body>
</html>

