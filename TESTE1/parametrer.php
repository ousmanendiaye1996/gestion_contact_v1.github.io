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

    <a href="accueil.php" class="button">Ajouter un compte utilisateur</a>

    <a href="accueil.php" class="button">RETOUR</a>
	