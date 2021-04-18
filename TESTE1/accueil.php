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

include "header.php";

?>



<center>
<fieldset class="fieldset_home_page" 
  style=" width: 50%;
	 height: auto; 
	 text-align: center; 
	 background-color: blue;
	 color: white;
	 border: 1 white solid;
	                           width: 550px;
								height: 410px;
								text-align: justify;
								border: 2px solid black;
								overflow: auto;
								float:left;
  ">	






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
 
		<h1>LISTE  DES  CONTACTS</h1>
			<?php
			while ($value = $req->fetch()) {
		?>

		
				<div>
				<table  style="font-style: normal;
				               color:aqua;
							   width: 300px;
								height: 90px;
								text-align: justify;
								border: 1px solid black;
								overflow: auto;
															">

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







  </fieldset><br><br><br>
</body>
</html>

<?php

include "footer.php";

?>