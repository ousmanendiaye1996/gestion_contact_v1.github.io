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
    	<h1 id="authentification" class="authentification">MODIFICATION</h1>
<form method="post" action="modifier2.php">
<input hidden name="num_contact" id="num_contact" type="text" value="
	 	  <?= $contac['id'];  ?>"/>
       
      <p>
	    <label for="nom">  Nom </label>
          <input name="nom" type="text" id="nom" value="
	 	  <?= $contac['nom'];  ?>" />
      </p>

	  <p>
	    <label for="prenom">  Prenom </label>
          <input name="prenom" type="text" id="prenom" value="
	 	  <?= $contac['prenom'];  ?>" />
      </p>

	  <p>
	    <label for="telephone">  Telephone </label>
          <input name="telephone" type="text" id="telephone" value="
	 	  <?= $contac['telephone'];  ?>" />
      </p>

	  <p>
	    <label for="adresse"> Adresse </label>
          <input name="adresse" type="text" id="adresse"value="
	 	  <?= $contac['adresse'];  ?>" />
      </p>

	  <p>
	    <label for="email">  	E-Mail </label>
          <input name="email" type="text" id="email"value="
	 	  <?= $contac['email'];  ?>" />
      </p>
      
       
  <p>  <input type="submit" value="ENREGISTRER"/>
  <!--<a href="accueil.php" class="button">RETOUR</a>-->
</p>


</form></fieldset>
<br>
<?php

include "footer.php";

?>