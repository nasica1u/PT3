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
	<li><a href="vFormGestion.php">Gestion Articles / Services / Fournisseurs</a></li>
	<li><a href="vFormAdmin.html">Administration</a></li>
	<li><a href="html/contact.html">contact</a></li>
	<li><a href="html/ressources.html">liens</a></li>
	</ul>
</nav>
<div id="rubrique">Passer commande</div>
</header>
<div id="corps">
<h1 id="titre01">Passer commande</h1>
	<article class="newspaper">
		<p>
		 <form id="add-form">
		  <fieldset>
			<legend>Ajouter article à la commande:</legend>
			Designation:<?php include("../controllers/selectToAdd.php");?><br>
			Quantité: <input id="quantite" name="quantite" type="number" min="1"><br>
			<button id="add"> Ajouter article </button>
		  </fieldset>
		</form> 
		</p>
		
		<p id="commandeList"> Votre commande: </p>
		<p> Fournisseur:  </p><?php include("../controllers/selectFourn.php");?><br>
		<button id="confirm1"> Commander </button><button id="cancel1"> Annuler </button>
	</article>
</div>
<footer id="piedPage"> 
<div id="mLegales"><p> Site Paul-Antoine Bisgambiglia 2016-2017 </p>
</div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		var liste = [];
		var priceListe = [];
		var fournisseur = "none";
		$("body").on('click', '#add', function(e){
			e.preventDefault();
			var designation = $("#designation").val();
			var quantite = $("#quantite").val();
			$.post('../controllers/ajouterArtCommande.php',
			{
				designation:designation,
				quantite:quantite
			},
			function(data){
				var json = JSON.parse(data);
				if(json.status == 'success'){
					if(contains(liste, "designation", designation) == -1){
						liste.push({"designation": designation, "quantite": quantite});
					}
					else{
						var index = contains(liste, "designation", designation);
						liste[index] = {"designation": designation, "quantite": quantite};
					}
					$("#commandeList").empty();
					for(i=0; i<liste.length; i++){
						$("#commandeList").append("<li id=\'"+i+"\'>"+liste[i]["designation"]+" x"+liste[i]["quantite"]+"</li>");
					}
				}
				if(json.status == 'fail'){
					alert(json.message);
				}
			},
			"text");
		});
		
		$("body").on('click', "#cancel1", function(){
			clearChamps();
		});
		
		$("body").on('click', "#confirm1", function(){
			if(liste.length != 0){
				fournisseur = $("#fournisseur").val();
				$.ajax({
					url : '../controllers/getPriceArt.php',
					type : 'POST',
					dataType : 'json',
					success : function(reponse){
						var price = 0;
						$(".newspaper").empty();
						$(".newspaper").append("<div id='recap'> Récapitulatif de votre commande: </div>");
						for(i=0; i<liste.length; i++){
							var d = liste[i]["designation"];
							var q = liste[i]["quantite"];
							$("#recap").append("<li id=\'r"+i+"\'>"+d+" x"+q+" - "+reponse[d]*q+"€"+"</li>");
							price += reponse[d]*q;
							priceListe[i] = reponse[d]*q;
						}
						$("#recap").append("<p> Total: "+ price +"€"+"<br>Fournisseur: "+fournisseur+"</p>");
						$("#recap").append("<button id=\"confirm2\"> Valider </button>");
					}

				});
			}
		});
		
		$("body").on('click', "#confirm2", function(){
			for(i = 0; i<liste.length; i++)
			{
				var des = liste[i]["designation"];
				var qte = liste[i]["quantite"];
				var price = priceListe[i];
				$.ajax({
					url : '../controllers/submitCommand.php',
					method : "POST",
					data : {
						designation : des,
						quantite : qte,
						prix : price,
						fournisseur : fournisseur
					},
					success : function(reponse){
						alert(reponse);
					}
				});
			}
		});
	});
	
	function contains(list, key, value){
		for(i = 0; i<list.length; i++){
			if(list[i][key] == value){
				return i;
			}
		}
		return -1;
	}
	
	function clearChamps(){
		$("#commandeList").empty();
		liste = [];
	}
</script>

</body>
</html>