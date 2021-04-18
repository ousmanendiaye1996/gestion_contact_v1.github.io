<style type="text/css">
	
	.search-bar {
height: 29px;
background-color: #e1e1e1;
-moz-border-radius: 100px;
-webkit-border-radius: 100px;
border-radius: 100px;
position:relative;
width:230px
}
.search-bar .searchbutton {
position:absolute;
top:23%;
right:5px;
}
.sfield {
float: left;
margin: 5px 0 0 8px;
font: 8pt Verdana;
color: #888;
height: 20px;
line-height: 18px;
padding: 0;
background: transparent;
border: 0;
max-width: 125px
}

</style>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Accueil</title>
<link rel="stylesheet" type="text/css" href="style2.css">
<link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>
	<center>
	
    <fieldset class="fieldset_home_page" style=" width: 90%;
	 height: auto; 
	 text-align: center; 
	 background-color: rgb(9, 161, 207); 
	 color: white;
	 border: 5 white solid;">		
    	<legend><h1>Gestion De Contact</h1></legend>

<table style=" width: 90%;
	 height: auto; 
	 background-color: yellow; 
	 color: red;
	 border: 5 white solid;">
<tr>	
<td class="td1">
	<div class="search-bar">
	<input type="text" class="sfield" name="searchterm" maxlength="30" value="" placeholder="RECHERCHER">
	<input type="image" class="searchbutton" name="search" src="images/search1.png" style="width: 10%;" alt="Search">
</td>

<td class="td2"><a href="ajout.php"><img src="images/plus1.png" style="width: 20%;" alt="Search" title="NOUVEAU CONTACT" /></a>
</td>

<td class="td3"><a href=""><img src="images/filtre.png" style="width: 30%;" alt="Search" title="FILTRER LES CONTACTS"/></a>
</td>

<td class="td3"><a href=""><img src="images/maintenance1.png" style="width: 30%;" alt="Search" title="PARAMETTRES "/></a>
</td>

</tr>
</table>
	










	<?php

try {
		
	//E´ tablir la connexion avec la base de donne´es
	$username="root";
	$password="";
	$dsn="mysql:host=localhost; dbname=test; charset=utf8";
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Cr´eer et pr ´eparer des requˆetes SQL
	$req = $db->query("select * from contact");

	//Ex´ecuter et r ´ecup´ erer le r ´ esultat de la requˆete
	/*Exemple avec PDO::FETCH OBJ
	 while ($tuple = $req->fetch(PDO::FETCH_OBJ))*/
       ?>
 
 <h1>LISTE  DES  CONTACTS</h1>
       <?php
	while ($value = $req->fetch()) {
?>

		
				<div>
				<table>
                <tr>
					<td><h4>ID: <?php echo "$value[0]";?> </h4><br></td>
					<td><h4>NOM: <?php echo "$value[1]";?> </h4><BR></td>
					<td><h4>PRENOM: <?php echo "$value[2]";?> </h4><BR></td>
					<td><h4>TELEPHONE: <?php echo "$value[4]";?> </h4><BR></td>
					<td><h4>ADRESSE: <?php echo "$value[5]";?> </h4><BR></td>
					<td><h4>EMAIL: <?php echo "$value[6]";?> </h4><BR></td>
					<td><h4> <a href="modifier.php?num_contact=<?= $value['id'] ?>">MODIFIER</a> </h4><BR></td>
					<td><h4> <a href="supprimer.php?id=<?= $value['id'] ?>">SUPPRIMER</a> </h4><BR></td>
				</tr>
				</table>	
				</div><?php
	}
	//Fermer le curseur pour ex´ecuter une autre requˆete
	$req->closeCursor();
	// pour fermer la connexion
	$db = null;
	


} catch (PDOException $e) {

	die("Eurreure" .$e->getMessage());
}


?>










  </fieldset>	
</body>
</html>