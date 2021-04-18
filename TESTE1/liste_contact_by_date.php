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

<?php

include "header.php";

?>


<center>
		
		<fieldset style="width: 60%; float:left">	
		<div class="container">
	<div class="dropdown">
		<button class="boutonmenuprincipal">
			<img src="images/filtre.png" style="width: 10%;" alt="Search" title="FILTRER LES CONTACTS"/>
		</button>
		<div class="dropdown-child">
		<a href="liste_detail_contac.php">Affichage Detaille</a>
			<a href="liste_contact_by_nom.php">Affichage Par NOM</a>
			<a href="liste_contact_by_prenom.php"> AffichagePar Prenom</a>
			<a href="liste_contact_by_date.php"> AffichagePar Date</a>
			
		</div>
	</div>
</div>
</fieldset>
</center>



<style type="text/css">
	

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





.boutonmenuprincipal {
background-color: #e83737;
color: white;
border: none;
cursor: pointer;
padding:20px;
margin-top:20px;
font-size: 30px;
}
.boutonmenuprincipal:hover {
background-color: #ff4444;
}
.dropdown {
position: relative;
display: inline-block;
}
.dropdown-child {
display: none;
background-color: #f28c8c;
min-width: 50px;
}
.dropdown-child a {
color: white;
padding: 20px;
text-decoration: none;
display: block;
}
.dropdown:hover .dropdown-child {
display: block;
}

</style>

<br><br>
<fieldset style="width: 60%; float:left">





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

	//Ex´ecuter et r ´ecup´ erer le r ´ esultat de la requˆete
	/*Exemple avec PDO::FETCH OBJ
	 while ($tuple = $req->fetch(PDO::FETCH_OBJ))*/
       ?>
 
 <h1>LISTE  DES  CONTACTS TRIES PAR NOM</h1>
       <?php
	while ($value = $req->fetch()) {
?>

		
				<div>
				<table  style="font-style: normal; color:aqua;">
                <tr>
					<td><h4> <?php echo "$value[0]";?> </h4><br></td>
					<td><h2 style="text-transform: capitalize; font-style: normal;">:<a href="aff_contact.php?num_contact=<?= $value['id'] ?>"> <?php echo "$value[2]";?></h2><BR></td>
					<td><h2 style="text-transform: capitalize; font-style: normal;"> <a href="aff_contact.php?num_contact=<?= $value['id'] ?>"><?php echo "$value[1]";?>  </a></h2><BR></td>
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










  </fieldset>	<br>
  <?php

include "footer.php";

?>
</body>
</html>