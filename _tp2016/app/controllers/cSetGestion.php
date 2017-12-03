<?php
// define variables and set to empty values
$articleErr = $serviceErr = $fournisseurErr = "";
$name = $article = $quantite = $service = $fournisseur = $adresse = $telephone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["article"]))
	{
	  if (empty($_POST["designation"])) {
		$articleErr = "Article is required ";
	  } else {  
		$designation = test_input($_POST["designation"]);
	  }
	  if (empty($_POST["quantite"])) {
		$articleErr .= "quantite is required";
	  } else { 
		$quantite = test_input($_POST["quantite"]);  
	  }
	 if ($articleErr != "")
	 {
		header('Location: ../views/vFormGestion.php?retour=article&message='.$articleErr);
		exit;
	 }
	 else
	 {
		require '../models/mArticle.php';
		$donnees = ['idnum' => 0, 'designation' => $designation, 'quantite' => $quantite];
		$oArticle = new Article($donnees);
		if ($oArticle->quantite() > intval($quantite))
		{
			$oArticle->setQuantite(intval($oArticle->quantite()) - intval($quantite));
			$oArticle->update();
			$pluriel = '';
			if (intval($quantite)>1) $pluriel = 's';  
			$articleErr = $quantite." article".$pluriel. " retiré".$pluriel; 
		}
		else
		{
			$articleErr ="Quantite supperieure au stock";
		}
		header('Location: ../views/vFormGestion.php?retour=article&message='.$articleErr);
		exit;
	 }
	}
	if (!empty($_POST["service"]))
	{
	  require '../models/mService.php';
	  if (empty($_POST["libelle"])) {
		$serviceErr = "libelle is required";
	  }
	  else {
		$service = test_input($_POST["libelle"]);
	  }
	 if ($serviceErr != "")
	 {
		header('Location: ../views/vFormGestion.php?retour=service&message='.$serviceErr);
		exit;
	 }
	 else
	 {
		$donnees = ['idd' => 0, 'libelle' => $service];
		$monObjet = new Service($donnees);
		$serviceErr = "Le service a été ajouté";
		header('Location: ../views/vFormGestion.php?retour=service&message='.$serviceErr);
		exit;
	 }
	}
	if (!empty($_POST["fournisseur"]))
	{
	  require '../models/mFournisseur.php';
	  if (empty($_POST["nom"])) {
		$fournisseurErr = "Fournisseur is required ";
	  } else {
		$fournisseur = test_input($_POST["nom"]);
	  }
	  if (empty($_POST["adresse"])) {
		$fournisseurErr .= "adresse is required ";
	  } else {
		$adresse = test_input($_POST["adresse"]);
	  }
	  if (empty($_POST["telephone"])) {
		$fournisseurErr .= "Telephone is required";
	  } else {
		$telephone = test_input($_POST["telephone"]);
	  }
	 if ($fournisseurErr != "")
	 {
		header('Location: ../views/vFormGestion.php?retour=fournisseur&message='.$fournisseurErr);
		exit;
	 }
	 else
	 {
		$donnees = ['idd' => 0, 'nom' => $fournisseur, 'adresse' => $adresse, 'telephone' => $telephone];
		$monObjet = new Fournisseur($donnees);
		$fournisseurErr = "Ajout du fournisseur";
		header('Location: ../views/vFormGestion.php?retour=fournisseur&message='.$fournisseurErr);
		exit;
	  }
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>