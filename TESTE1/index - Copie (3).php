<?php

try {
		
	//E´ tablir la connexion avec la base de donne´es
	$username="root";
	$password="";
	$dsn="mysql:host=localhost; dbname=test; charset=utf8";
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Cr´eer et pr ´eparer des requˆetes SQL
	$req = $db->query("select * from location");

	//Ex´ecuter et r ´ecup´ erer le r ´ esultat de la requˆete
	/*Exemple avec PDO::FETCH OBJ
	 while ($tuple = $req->fetch(PDO::FETCH_OBJ))*/
	while ($tuple = $req->fetch()) {
	echo $tuple["nom"] . " ". $tuple["prenom"]. "<br>";
	}
	//Fermer le curseur pour ex´ecuter une autre requˆete
	$req->closeCursor();
	// pour fermer la connexion
	$db = null;
	// ou ainsi
	unset($db);


} catch (PDOException $e) {
	$db->rollBack();
	die("Eurreure" .$e->getMessage());
}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulaire</title>
</head>
<body>
<form method="post" action="test.php">
<div>
nom : <input type="text" name="nom">
</div>
<div>
prenom : <input type="text" name="prenom">
</div>
<div>
<input type="submit" value="connexion">
</div>
</form>
</body>
</html>