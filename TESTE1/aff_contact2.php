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
	$num_contact=$pdoStat['id'];
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
					<tr><td><h4>NOM: <?php echo "$contac[1]";?> </h4><BR></td></tr>
					<tr><td><h4>PRENOM: <?php echo "$contac[2]";?> </h4><BR></td></tr>
					<tr><td><h4>TELEPHONE: <?php echo "$contac[4]";?> </h4><BR></td></tr>
					<tr><td><h4>ADRESSE: <?php echo "$contac[5]";?> </h4><BR></td></tr>
					<tr><td><h4>EMAIL: <?php echo "$contac[6]";?> </h4><BR></td></tr>
					<tr><td><h4> <a href="modifier.php?num_contact=<?= $contac['id'] ?>">MODIFIER</a> </h4><BR></td>
					<td><h4> <a href="supprimer.php?id=<?= $contac['id'] ?>">SUPPRIMER</a> </h4><BR></td></tr>
				</tr>
				</table>
  <p>  
  <a href="accueil.php" class="button">RETOUR</a>
</p>


</form>
<br><br><br>
