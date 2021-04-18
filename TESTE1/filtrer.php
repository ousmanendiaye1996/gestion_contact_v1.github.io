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


<br>
<center>
		
		<fieldset style="width: 50%; float:left">	
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
	<br>
		

	<?php

include "footer.php";

?>