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

a{
	color: aqua;
}

</style>
<?php

try {
		
	//E´ tablir la connexion avec la base de donne´es
	$username="root";
	$password="";
	$dsn="mysql:host=localhost; dbname=test; charset=utf8";
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Cr´eer et pr ´eparer des requˆetes SQL
	$req = $db->query("select * from contact ORDER By id DESC  ");

	if (isset($_GET['s']) AND !empty($_GET['s']) )
	{
     $recherche=htmlspecialchars($_GET['s']);
	 $allusers=$db->query('select * from contact where nom LIKE "%'.$recherche.'%" ORDER By id DESC ');
      

	}

 
	//Fermer le curseur pour ex´ecuter une autre requˆete
	$req->closeCursor();
	// pour fermer la connexion
	$db = null;
	


} catch (PDOException $e) {

	die("Eurreure" .$e->getMessage());
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Accueil</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
<link rel="stylesheet" type="text/css" href="style2.css">
<link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>
	<center>
	
    <fieldset class="fieldset_home_page" style=" width: 95%;
	 height: auto; 
	 text-align: center; 
	 background-color: rgb(9, 161, 207); 
	 color: white;
	 border: 5 white solid;">	
	
	<div>
	<table>
	  <tr>
    	<!--<img src="images/Circle-icons-contacts.svg.png" style="width: 10%;" alt="Search" title="IMG CONTACT" style="float: left;"/>-->
		<td style="width: 8%;"><h1><a href="accueil.php"><img src="images/home.png" style="width: 28%;" alt="HOME" title="HOME"/></a></h1>
		</td>
			<td style="width: 60%; background-color:blue;"><center><H1 style=" background-color:blue; color:brown; ">GESTION CONTACT</H1></td></center>
		
			

		<td style="width: 10%;"><a href="logout.php" style="float: right;"><img src="images/7479.png" style="width: 25%;" alt="DECONNEXION" title="DECONNEXION"/></a></td>
	  </tr>
	  </table>
	</div>
<table style=" width: 95%;
	 height: auto; 
	 background-color: yellow; 
	 color: red;
	 border: 5 white solid;">
<tr>	
	<form method="GET" action="">
	<!--<form method="GET" action="affiche_recherche.php">-->
		<td class="td1">
			<div class="search-bar">
			<input  style="width: 120%;"  type="text" class="sfield" name="s" maxlength="30" value="" placeholder="RECHERCH PAR NOM">
			<A href="#" />
			<input type="image" class="searchbutton" name="s" src="images/search1.png" style="width: 10%;" alt="Search">
			</A>
		</td>
   </form>

 
<td class="td2"><a href="ajout.php"><img src="images/plus1.png" style="width: 20%;" alt="Search" title="AJOUTER NOUVEAU CONTACT" /></a>
</td>

<!--
<div class="container">
	<div class="dropdown">
		<button class="boutonmenuprincipal"><a href="">
			<img src="images/filtre.png" style="width: 20%;" alt="Search" title="FILTRER LES CONTACTS"/></a>
		</button>
		<div class="dropdown-child">
		<a href="http://www.votresite.com/page1.html">Affichage Detaille</a>
			<a href="http://www.votresite.com/page1.html">Affichage Par NOM</a>
			<a href="http://www.votresite.com/page2.html"> AffichagePar Prenom</a>
		</div>
	</div>
</div>-->


<td class="td3"><a href="filtrer.php"><img src="images/filtre.png" style="width: 30%;" alt="Search" title="FILTRER L'AFFICHAGE DES CONTACTS"/></a>
</td>

<td class="td3"><a href="about.php"><img src="images/about-icon-14.jpg" style="width: 60%;" alt="about" title="A PROPOS "/></a>
</td>

</tr>
</table>



<section style="float: left;
                                width: 360px;
								height: 430px;
								text-align: justify;
								border: 0px solid black;
								overflow: auto;
                ">


<?php
//include "accueil.php";
if (isset($_GET['s']) AND !empty($_GET['s']) )
	{
		if($allusers->rowCount() > 0){
		while($user=$allusers->fetch()){
			?>

		<h1 id="authentification" class="authentification">	INFORMATION DETAILLEES</h1>

		<table style="font-style: normal; ">
				<tr><input hidden name="num_contact" id="num_contact" type="text" value="
		<?= $user['id'];  ?>"/>
					<tr><td><h4>ID: <?php echo "$user[0]";?> </h4></td></tr>
					<tr><td><h4>NOM: <?php echo "$user[1]";?> </h4></td></tr>
					<tr><td><h4>PRENOM: <?php echo "$user[2]";?> </h4></td></tr>
					<tr><td><h4>TELEPHONE: <?php echo "$user[4]";?> </h4></td></tr>
					<tr><td><h4>ADRESSE: <?php echo "$user[5]";?> </h4></td></tr>
					<tr><td><h4>EMAIL: <?php echo "$user[6]";?> </h4></td></tr>

					
					<tr><td style="width: 50%; float:left;"><h4> <a href="modifier.php?num_contact=<?= $user['id'] ?>"><img src="images/modify2.png" style="width: 40%;" alt="CLIQUER POUR  MODIFIER" title="CLIQUER POUR  MODIFIER"/> </a> </h4></td>
					<td style="width: 30%; float:left;"><h4> <a href="supprimer.php?id=<?= $user['id'] ?>"><button  onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"> <img src="images/delete.png" style="width: 80%;" alt="CLIQUER POUR SUPPRIMER" title="CLIQUER POUR SUPPRIMER"/> </a> </h4></td>
					<td style="width: 20%; float:center;"><h4> <a href="accueil.php">  ABANDONNER</a> </h4><BR></td></tr>
				</tr>
				</table>

		

			<?php
		}
    }else{

         ?>
				<script>
				alert("AUCUN CONTACT TROUVE  !!!");
				</script>

					<?php
   }
}
?>



</section>


</body>
</html>