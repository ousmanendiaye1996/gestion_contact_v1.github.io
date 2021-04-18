<?php

try {
		
	//E´ tablir la connexion avec la base de donne´es
	$username="root";
	$password="";
	$dsn="mysql:host=localhost; dbname=test; charset=utf8";
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Cr´eer et pr ´eparer des requˆetes SQL
	//$pdoStat= $db->prepare(' UPDATE contact SET nom=:nom, prenom=:prenom, adresse=:adresse, telephone=:telephone, email=:email WHERE id=:num LIMIT 1 ');
    $nom=$_POST['nom'];
	 $prenom=$_POST['prenom'];
	 $adresse=$_POST['adresse'];
	 $telephone=$_POST['telephone'];
	 $email=$_POST['email'];
	 $id=$_POST['num_contact'];
	
	 $pdoStat = $db->query("UPDATE  contact set nom='$nom', prenom='$prenom', adresse='$adresse', telephone='$telephone', email='$email' where id='$id' limit 1 ");

	// liaison du paramettre nome
	/*$pdoStat->bindValue(':num', $_POST['num_contact'], PDO::PARAM_INT);
	$pdoStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
	$pdoStat->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
	$pdoStat->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
	$pdoStat->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_STR);
	$pdoStat->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
*/
	//EXCECUTION DE LA REQUETTE
	$executeIsOk= $pdoStat->execute();

	if($executeIsOk){?>
		<script>
			alert ('la modification a ete effectue');
			</script>
			<?php 
			echo "<body onLoad='alert(' effectuée...') '> ";
			echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
		   
			?>
	
		
		<?php
		}else{?>
			<script>
			alert ("ECHEC DE LA MODIFICATION");
			</script>
			  <?php 
			echo "<body onLoad='alert('n'est pas reussie...')''> ";
			echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
		   
			?>
			
			 <?php
			 } 
	

	

} catch (PDOException $e) {

	die("Eurreure" .$e->getMessage());
}

?>


