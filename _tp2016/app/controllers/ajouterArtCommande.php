<?php
	$designation = "";
	$quantite = 0;
	$reponse = "none";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST['quantite'])){
			$reponse =  "Erreur champ vide";
			fail($reponse);
		}
		else{
			$designation = $_POST["designation"];
			$quantite = $_POST["quantite"];
			$reponse = $designation." x".$quantite." ajouté à votre commande";
			success($reponse);
		}
	}
	
	function fail($message) {
		die(json_encode(array('status' => 'fail', 'message' => $message)));
	}
	function success($message) {
		die(json_encode(array('status' => 'success', 'message' => $message)));
	}
?>