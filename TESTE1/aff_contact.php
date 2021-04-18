<?php

include "header.php";

?>



<?php
try {
		
	//E´ tablir la connexion avec la base de donne´es
	$username="root";
	$password="";
	$dsn="mysql:host=localhost; dbname=test; charset=utf8";
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Cr´eer et pr ´eparer des requˆetes SQL
	$pdoStat= $db->prepare("select * from contact where id=:num ");

	// liaison du paramettre nome
	$pdoStat->bindValue(':num', $_GET['num_contact'], PDO::PARAM_INT);

	//EXCECUTION DE LA REQUETTE
	$executeIsOk= $pdoStat->execute();

	 //RECUPERER LE CONTACT
	$contac=$pdoStat->fetch();
	

	

} catch (PDOException $e) {

	die("Eurreure" .$e->getMessage());
}

?>





<html>
<head>
</head>
<link rel="stylesheet" type="text/css" href="style3.css">
<script type="text/javascript" src="script.js"></script>

<body>


<center>
		
    <fieldset style="width: 50%;">	
    	<h1 id="authentification" class="authentification">	INFORMATION DETAILLEES</h1>

		<table style="font-style: normal; ">
                <tr><input hidden name="num_contact" id="num_contact" type="text" value="
	 	  <?= $contac['id'];  ?>"/>
					<tr><td><h4>ID: <?php echo "$contac[0]";?> </h4><br></td></tr>
					<tr><td><h4>NOM: <?php echo "$contac[1]";?> </h4></td></tr>
					<tr><td><h4>PRENOM: <?php echo "$contac[2]";?> </h4></td></tr>
					<tr><td><h4>TELEPHONE: <?php echo "$contac[4]";?> </h4></td></tr>
					<tr><td><h4>ADRESSE: <?php echo "$contac[5]";?> </h4></td></tr>
					<tr><td><h4>EMAIL: <?php echo "$contac[6]";?> </h4></td></tr>
					
					<tr><td><h4> <a href="modifier.php?num_contact=<?= $contac['id'] ?>">
					<img src="images/modify2.png" style="width: 15%;" alt="CLIQUER POUR  MODIFIER" title="CLIQUER POUR  MODIFIER"/></a> </h4></td>
					
					
					<td><h4> <a href="supprimer.php?id=<?= $contac['id'] ?>">
					<button  onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">
					<img src="images/delete.png" style="width: 35%;" alt="CLIQUER POUR SUPPRIMER" title="CLIQUER POUR SUPPRIMER"/></a> </h4></td></tr>

					</button>

					
					<!--<img src="images/home.png" style="width: 28%;" alt="HOME" title="HOME"/> MODIFIER</a> </h4><BR></td>
					<td><h4> <a href="supprimer.php?id=<?= $contac['id'] ?>">SUPPRIMER</a> </h4><BR></td></tr>-->
				</tr>
				</table>
  <p>  
  <a href="accueil.php" class="button">RETOUR</a>
</p>


</form></fieldset><br>
<br>
<?php

include "footer.php";

?>