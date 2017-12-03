<?php

require "../models/mDataBase.php";

try {
 	$conn = myConnection();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tp_commande");
    $stmt->execute();
	
	$idFournisseur = array();
	$idArticle = array();
	$quantite = array();
	$date = array();
	$prix = array();
	
	$result = $stmt -> fetchAll();
	$i = 0;
	foreach( $result as $row ) {
		$idFournisseur = $row['idFournisseur'];
		$idArticle = $row['idArticle'];
		//$quantite = $row['quantite'];
		$date = $row['date'];
		$prix = $row['prix'];
		echo $idFournisseur." | ".$idArticle." | ".$date." | ".$prix."<br>";
		$i++;
	}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
