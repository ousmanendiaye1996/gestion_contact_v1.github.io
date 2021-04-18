<?php

include "header.php";

?>




<?php
try {
$username = "root";
$password = "";
$dsn = "mysql:host=localhost;dbname=test;charset=utf8";
$db = new PDO($dsn, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req = $db->query("select * from contact  ");
if ($req) {
	if (isset($_POST['submit']) )
	{   
		
	
		
         //Vérifier si une entrée existe dans la base de données.
			/*$nom=$_POST['nom'];
			$result2 = $db->query('SELECT EXISTS (SELECT * FROM contact WHERE nom=$nom) AS contact_exists');
			$req2 =$db->query($result2)->fetch();
	
	
		if (isset($_POST['submit']) )
		{
            
			if ($req2['contact_exists'] == true) 
				{?>

					<script>
						alert(" email existe!!!");
					</script>
			
					<?php
			    } else 
				{?>

					<script>
						alert("NOM!!!");
					</script>
			
					<?php
			    }*/

		if($_POST['nom']=='')
		{?>

		<script>
			alert("NOM : EST OBLIGATOIRE!!!");
		</script>

		<?php
			echo "<body onLoad='alert('NOM : EST OBLIGATOIRE!!!')'> ";
			echo "<meta http-equiv='refresh' content='0;URL=ajout.php'>";
		}elseif($_POST['prenom']=='')
			{?>

			<script>
				alert("PRENOM: EST OBLIGATOIRE!!!");
			</script>
				
			<?php
			echo "<body onLoad='alert('PRENOM: EST OBLIGATOIRE!!!')'> ";
			echo "<meta http-equiv='refresh' content='0;URL=ajout.php'>";
	
		} elseif($_POST['telephone']=='')
			{?>

			<script>
				alert("TELEPHONE: EST OBLIGATOIRE!!!");
			</script>
				
			<?php
			echo "<body onLoad='alert('TELEPHONE: EST OBLIGATOIRE!!!')'> ";
			echo "<meta http-equiv='refresh' content='0;URL=ajout.php'>";
		}elseif($_POST['adresse']=='')
			{?>

			<script>
				alert("ADRESSE: EST OBLIGATOIRE!!!");
			</script>
				
			<?php
			echo "<body onLoad='alert('ADRESSE: EST OBLIGATOIRE!!!')'> ";
			echo "<meta http-equiv='refresh' content='0;URL=ajout.php'>";
			}  elseif($_POST['email']=='')
			{?>

			<script>
				alert("E-MAIL: EST OBLIGATOIRE!!!");
			</script>
				
			<?php
			echo "<body onLoad='alert('email: EST OBLIGATOIRE!!!')'> ";
			echo "<meta http-equiv='refresh' content='0;URL=ajout.php'>";
	 } else{}

	}else{}
}else{}


if(isset($_POST['submit']))
if(!empty($_POST['nom']) ){
	if(!empty($_POST['prenom']) ){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$telephone = $_POST['telephone'];
	$adresse = $_POST['adresse'];
	$email = $_POST['email'];


	if(isset($_POST['submit'])){
	if ($req) {

		
        if (isset($_POST['submit']) )
		{
		if($_POST['nom']=='')
		{?>

		<script>
			alert("NOM : EST OBLIGATOIRE!!!");
		</script>

		<?php
			echo "<body onLoad='alert('NOM : EST OBLIGATOIRE!!!')'> ";
			echo "<meta http-equiv='refresh' content='0;URL=ajout.php'>";
		} elseif($_POST['prenom']=='')
		{?>

		<script>
			alert("PRENOM: EST OBLIGATOIRE!!!");
		</script>
			
		<?php
		echo "<body onLoad='alert('prenom: EST OBLIGATOIRE!!!')'> ";
		echo "<meta http-equiv='refresh' content='0;URL=ajout.php'>";
	} 


$req = $db->exec("INSERT INTO contact (nom, prenom, telephone, adresse, email, genre) VALUES('$nom
', '$prenom', '$telephone', '$adresse', '$email', '')");
if($req){

	?>
	<script>
		alert("INSERTION REUSSIE");

	</script>
<?php
$nom="";
$prenom="";
$_POST['nom']="";
$_POST['prenom']="";
}else{

	?>
	<script>
		alert("echec d'insertion");
	</script>
<?php
}	
}
}
}	
}
}

} catch (PDOException $e){
  echo ("Erreur : " . $e->getMessage());
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulaire</title>
<link rel="stylesheet" type="text/css" href="style3.css">
<link rel="stylesheet" type="text/css" href="style2.css">

<script type="text/javascript" src="script.js"></script>


<center>
		
    <fieldset style="width: 50%; float:left">	
    	<h1 id="authentification" class="authentification">AJOUTER NOUNEAU CONTACT</h1>
<form method="post" action="" id="submit" name="submit">
		<div>
		 <label for="nom"> NOM: </label>
		 <input type="text" name="nom" placeholder="ENTRER VOTRE NON "/>
		</div>

		<div>
		 <label for="prenom"> PRENOM: </label>
		   <input type="text" name="prenom" placeholder="ENTRER VOTRE PRENOM"/>
		</div>

		<div>
		 <label for="telephone"> TELEPHONE: </label>
		   <input type="text" name="telephone" placeholder="ENTRER VOTRE N' TELEPHONE"/>
		</div>

		<div>
		 <label for="adresse"> ASRESSE: </label>
		   <input type="text" name="adresse" placeholder="ENTRER VOTRE ADRESSE"/>
		</div>

		<div>
		 <label for="email"> E-MAIL: </label>
		   <input type="text" name="email" placeholder="ENTRER VOTRE E-MAIL"/>
		</div>
		</BR></BR>
		<div>
		  <input type="submit" name="submit" id="submit" class="submit" value="AJOUTER"/>
		
		 <!-- <a href="accueil.php" class="button">RETOUR</a>-->
		</div>
		
</FORM> 

 </fieldset>	
<br>
<?php

include "footer.php";

?>