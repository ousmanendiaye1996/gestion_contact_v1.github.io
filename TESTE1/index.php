<?php
try {
		
// Connexion à la base de données MySQL
	$username="root";
	$password="";
	$dsn="mysql:host=localhost; dbname=test; charset=utf8";
	$db = new PDO($dsn, $username, $password);

	//affichage detaille des eurreurs
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (isset($_POST['login']) AND isset($_POST['password']) AND isset($_POST['ajouter'])){
	//Creer et preparer des requetes SQL
	$req = $db->query("select * from authentification ");
    // LES TESTES
	if ($req) {
        if (isset($_POST['ajouter']) )
		{
           /*if(  $_POST['login']=='' OR $_POST['password']==''  )
			{?>

				<script>
					alert("NOM D'UTILISATEUR ET MOT DE PASSE SONT OBLIGATOIRE!!!");
				</script>

				<?php
					echo "<body onLoad='alert('NOM D'UTILISATEUR: EST OBLIGATOIRE!!!')'> ";
					echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			}  */
			

			if($_POST['login']=='')
					{?>
		
						<script>
							alert("NOM D'UTILISATEUR: EST OBLIGATOIRE!!!");
						</script>
		
						<?php
							echo "<body onLoad='alert('NOM D\'UTILISATEUR: EST OBLIGATOIRE!!!')'> ";
							echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
					} 
					
					else
						if($_POST['password']=='')
						{?>
		
						<script>
							alert("MOT DE PASSE: EST OBLIGATOIRE!!!");
						</script>
		
						<?php
							echo "<body onLoad='alert('MOT DE PASSE: EST OBLIGATOIRE!!!')'> ";
							echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
					} 


			   else
			    if($_POST['login']=="ousmane@gmail.com" AND $_POST['password']=="test123"){

				sleep(2);
				header('Location:accueil.php');
				
					}else{
					?>
				<script>
				alert("LOGIN OU MOT DE PASSE INCORRECT!!!");
				</script>

					<?php
				}
			
			
			/* if($_POST['password']=='')
					{?>
		
						<script>
							alert("'password: EST OBLIGATOIRE!!!");
						</script>
		
						<?php
							echo "<body onLoad='alert('password: EST OBLIGATOIRE!!!')'> ";
							echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
					} 

			} elseif($_POST['password']=='')
			 {?>

				<script>
					alert("MOT DE PASSE: EST OBLIGATOIRE!!!");
				</script>
					
				<?php
				echo "<body onLoad='alert('MOT DE PASSE: EST OBLIGATOIRE!!!')'> ";
				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
				header('Location:accueil.php');
			} elseif($_POST['login']=="ousmane@gmail.com" AND $_POST['password']=="test123"){

				sleep(2);
				header('Location:accueil.php');
				
					}else{
					?>
				<script>
				alert("LOGIN OU MOT DE PASSE INCORRECT!!!");
				</script>

					<?php
				}*/

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
<title>Page d'authentification de zoo</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="script.js"></script>


<br>
						<?php
						
							 ?>
	<center>
    <fieldset>	
    	<h1 id="authentification" class="authentification">AUTHENTIFICATION</h1><br>
	<form id="formulaire" method="post" action="">
		<div>
		 <label for="login"><b> NOM D'UTILISATEUR: </b> </label>
		 <input id="login" type="text" name="login" placeholder="----------ENTRER VOTRE NON D'UTILISATEUR ---------------"/>
		</div><br><br>
		<div>
		 <label for="password"><b>  MOT DE PASSE: </b> </label>
		  <input id="password" type="text" name="password" placeholder="-------------ENTRER VOTRE MOT DE PASSE-----------------"/>
		</div>
		<div><br><br>
		  <input type="submit" value="connexion" name="ajouter"/>
		</div>
	</form><br>
	<a href="">S'inscrire ,<?php echo "  " ;?> </a>
	<a href="">Mot de passe oublie ?</a>
	<br><h5>By zooE</h5>
  </fieldset>	
  </center>
</body>
</html>

