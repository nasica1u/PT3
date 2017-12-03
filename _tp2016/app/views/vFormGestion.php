<!DOCTYPE html>
<head>
<META NAME="Content-language" CONTENT="french">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<META NAME="description" CONTENT="Mon super site">
<META NAME="keywords" CONTENT="cours master programmation S2I web site">
<META NAME="Author" CONTENT="PA BISGAMBIGLIA">
<META HTTP-EQUIV="Reply-to" CONTENT="bisgambiglia@univ-corse.fr">
<META NAME="Rating" CONTENT="General">
<link rel="stylesheet" media="screen" href="../../public/css/screen.css" type="text/css" />
<link rel="stylesheet" media="print" href="../../public/css/print.css" type="text/css" />
<link rel="stylesheet" media="screen and (max-width: 810px)" href="../../public/css/smallScreen.css" type="text/css" />
<title>Mon site pour les cours 2016</title>
</head>
<body>
<div>
<header>
 <div></div>
<nav id="menuNav">
	<ul>
	<li><a href="../../index.html">home</a></li>
	<li><a href="vFormCommande.php">Passer Commande</a></li>
	<li><a href="vGetCommande.html">Historique Commande</a></li>
	<li><a href="#">Gestion Articles / Services / Fournisseurs</a></li>
	<li><a href="vFormAdmin.html">Admin</a></li>
	<li><a href="vContact.html">Contact</a></li>
	<li><a href="cRessources.html">Liens</a></li>
	</ul>
</nav>
<div id="rubrique">Gestion</div>
</header>
<div id="corps">
<h1 id="titre01">Gestion</h1>
	<article class="newspaper">
	<h2><strong>Mon sous-titre</strong></h2>
		<p>
		 <form method="post" action="../controllers/cSetGestion.php">
		  <fieldset>
			<legend>Retirer article:</legend>
			<?php 
			 if (isset($_GET['retour']) and $_GET['retour']=='article')
				echo "<div id='error'><p class='error'>".$_GET['message']."</p></div>"; 
			?>
			Designation: <?php include("../controllers/select.php");?> <br>
			Quantité: <input id="quantite" name="quantite" type="text"><br>
			<input type="hidden" name="article" value="1">
			<input type="submit"/>
		  </fieldset>
		</form> 
		 <form method="post" action="../controllers/cSetGestion.php">
		  <fieldset>
			<legend>Ajouter service:</legend>
			<?php 
			 if (isset($_GET['retour']) and $_GET['retour']=='service')
				echo "<div><p class='error'>".$_GET['message']."</p></div>"; 
			?>
			Libellé: <input id="libelle" name="libelle" type="text"><br>
			<input type="hidden" name="service" value="2">
			<input type="submit"/>
		  </fieldset>
		</form> 
		 <form method="post" action="../controllers/cSetGestion.php">
		  <fieldset>
		  	<?php 
			 if (isset($_GET['retour']) and $_GET['retour']=='fournisseur')
				echo "<div><p class='error'>".$_GET['message']."</p></div>"; 
			?>
			<legend>Ajouter fournisseur:</legend>
			Nom: <input id="nom" name ="nom" type="text"><br>
			Adresse: <input id="adresse" name="adresse" type="text"><br>
			Téléphone: <input id="telephone" name="telephone" type="text"><br>
			<input type="hidden" name="fournisseur" value="3">
			<input type="submit"/>
		  </fieldset>
		</form> 
		</p>
	</article>
</div>
<footer id="piedPage"> 
<div id="mLegales"><p> Site Paul-Antoine Bisgambiglia 2016-2017 </p>
</div>
</footer>
</body>
</html>