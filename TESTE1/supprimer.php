<?php







try {
		
	//E´ tablir la connexion avec la base de donne´es
	$username="root";
	$password="";
	$dsn="mysql:host=localhost; dbname=test; charset=utf8";
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Cr´eer et pr ´eparer des requˆetes SQL
	$pdoStat= $db->prepare("delete from contact where id=:id limit 1");

	// liaison du paramettre nome
	$pdoStat->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

	//EXCECUTION DE LA REQUETTE
	$executeIsOk= $pdoStat->execute();

	if($executeIsOk){?>
	<script>
		alert ('SUPPREUSSION REUSSIE');
		</script>
		<?php 
		echo "<body onLoad='alert('Suppression effectuée...') '> ";
        echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
       
		?>

	
	<?php
	}else{?>
		<script>
		alert ("ECHEC DE LA SUPPREUSSION");
		</script>
		  <?php 
		echo "<body onLoad='alert('Suppression n'est pas reussie...')''> ";
        echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
       
		?>
		
		 <?php
		 } ?>



   <?php
} catch (PDOException $e) {

	die("Eurreure" .$e->getMessage());
}

?>
