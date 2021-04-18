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

<?php

include "header.php";

?>

<!DOCTYPE html>
<html>
<head>
<script>
    function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "formulaire.html", true);
  xhttp.send();
}
</script>


<script>
    function loadDoc2() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "fiche_contact.php", true);
  xhttp.send();
}
</script>
<html lang="fr" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Popup d'inscription</title>
		<meta name="description" content="Popup en CSS3 et JS pour le blog webdesignweb.fr" />
		<meta name="keywords" content="modal, window, overlay, modern, box, css transition, css animation " />
		<meta name="author" content="Stratis BAKAS" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic|Montserrat:400,700' rel='stylesheet' type='text/css'>
	

		<?php
try {
$username = "root";
$password = "";
$dsn = "mysql:host=localhost;dbname=test;charset=utf8";
$db = new PDO($dsn, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!empty($_POST['nom']) ){
	if(!empty($_POST['prenom']) ){
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$req = $db->exec("INSERT INTO contact (nom, prenom) VALUES('$nom
','$prenom')");
if($req){
	if($req!=0){
		if($req>0){

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
		alert("INSERTION REUSSIE");
	</script>
<?php
}	}}
	}}

} catch (PDOException $e){
  echo ("Erreur : " . $e->getMessage());
  }
?>


</head>
<body>
    <fieldset>		
    	<legend><h1>Carnet de contact</h1></legend>
	
		












<?php
try {
$username = "root";
$password = "";
$dsn = "mysql:host=localhost;dbname=test;charset=utf8";
$db = new PDO($dsn, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req = $db->query("select * from contact");
?>

<table border="1" style="float:left; width: 60%;">
  <tr>
    <!--<th >ID</th>
     <th>NOM</th>-->
      <th><h1>LISTE DES CONTACTS</h1></th>
	 
  </tr>

  
<?php
$res = $req->fetchAll();
foreach ($res as $key => $value) {?>

	
  
    
	 <!--<div class="content">
			<buttonclass="popup-button" data-modal="popup" type="button"><?php echo "$value[1]" ."     "."$value[2]"; ?> </button>
-->
<tr> <td class="td">	

         	<button style="width: 60%;" class="popup-button" data-modal="">
			<a href="fiche_contact.php"  ><?php echo "$value[1]" ."     "."$value[2]"; ?>    </a> 
			</button>

</td> </div><!-- .container -->
		 	<!-- LE CONTENU DE LA POPUP -->

		
				
		<!-- FIN DE LA POPUP -->

		 	<!-- CONTENU DE LA PAGE -->

		

<!-- FIN DU COTENU DE LA PAGE -->

		 

<?php
}
} catch (PDOException $e){
  echo ("Erreur : " . $e->getMessage());
  }


?>


</tr>
</table>

<div style="float: right; width:30%" >


	<button class="popup-button" data-modal="popup"><img src="images/plus1.png" style="width: 20%;" alt="Search" title="NOUVEAU CONTACT" /></button>




<!-- .content -->
<!--<div id="demo">
  <!--<h2>NOUVEAU CONTACT</h2>-->
  <!--<button type="button" onclick="loadDoc()">
  <img src="images/plus1.png" style="width: 30%;" alt="Search" title="NOUVEAU CONTACT" /></a>

  </button>
  </div>-->

<!--td class="td2"><a href=""><img src="images/plus1.png" style="width: 20%;" alt="Search" title="NOUVEAU CONTACT" /></a>
</td>-->



<div class="container">
	<div class="dropdown">
	<button class="boutonmenuprincipal"><a href=""><img src="images/filtre.png" style="width: 20%;" alt="Search" title="FILTRER LES CONTACTS"/></a>
	</button>
	<div class="dropdown-child">
	<a href="http://www.votresite.com/page1.html">Par NOM</a>
	<a href="http://www.votresite.com/page2.html">Par Prenom</a>

	</div>
	</div>
	</div>
	</div>









		<!-- LE CONTENU DE LA POPUP -->

		<div class="modal blur-effect" id="popup">
			<div class="popup-content">
				<h3>NOUVEAU CONTACT</h3>
				<!--<div>
					<p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<input type="text" placeholder="Adresse email" />
					<input type="submit" class="submit" value="je m'inscris2" />
					
					<div class="close"></div>
				</div>
-->
<form method="post" action="">
		<div>
		 <label for="nom"> NOM  </label><input type="text" name="nom" placeholder="----ENTRER VOTRE NON NOM ---------------"/>
		</div>
		<div>
		 <label for="prenom"> PRENOM: </label><input type="text" name="prenom" placeholder="---------ENTRER VOTRE PRENOM-----------------"/>
		</div>
		<div>
		  <input type="submit" class="submit" value="connexion"/>
		</div>
		
</FORM>  </fieldset>	
		<!-- FIN DE LA POPUP -->
		
		<!-- CONTENU DE LA PAGE -->

		
				
		</div><!-- .container -->

		<!-- FIN DU COTENU DE LA PAGE -->
		
<!-- .content -->
<!--<div id="demo">
  <!--<h2>NOUVEAU CONTACT</h2>-->
  <!--<button type="button" onclick="loadDoc()">
  <img src="images/plus1.png" style="width: 30%;" alt="Search" title="NOUVEAU CONTACT" /></a>

  </button>
  </div>
		<h3>LES INFORMATIONS DU CONTACT</h3>
				<div>
					

					<h4>ID: <?php echo "$value[0]";?> </h4><br>
					<h4>NOM: <?php echo "$value[1]";?> </h4><BR>
					<h4>PRENOM: <?php echo "$value[2]";?> </h4><BR>
					<h4>TELEPHONE: <?php echo "$value[3]";?> </h4><BR>
					<h4>ADRESSE: <?php echo "$value[4]";?> </h4><BR>
					<h4>EMAIL: <?php echo "$value[5]";?> </h4><BR>

				</div>
			</div>
		</div>-->

















<div class="overlay"></div><!-- La div overlay -->
		
		<!-- Le script qui crée la popup -->
		<script src="js/popup.js"></script>

		<!-- Pour l'effet blur -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="js/cssParser.js"></script>
		<script src="js/css-filters-polyfill.js"></script>
	</body>
</html>


<?php

include "footer.php";

?>