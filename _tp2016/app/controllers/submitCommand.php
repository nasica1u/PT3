<?php

require "../models/mDataBase.php";

try {
	$status = "c";
	$idService = 4;
	$date = date('Y-m-d');
	
 	$conn = myConnection();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = $conn->prepare('SELECT idd FROM tp_fournisseur WHERE nom = "'.$_POST["fournisseur"].'"');
    $stmt->execute();
	$idFourn = $stmt->fetch(PDO::FETCH_ASSOC);
	//echo $idFourn['idd'];
	
	$stmt = $conn->prepare('SELECT idnum FROM tp_article WHERE designation = "'.$_POST["designation"].'"');
    $stmt->execute();
	$idArt = $stmt->fetch(PDO::FETCH_ASSOC);
	//echo $idArt['idnum'];
	
	$quantite = $_POST['quantite'];
	
	$prix = $_POST['prix'];
	
    $sql = "INSERT INTO `tp_commande` VALUES (NULL".",'".(int) $idFourn["idd"]."','".(int) $idArt["idnum"]."','".$status."','".$quantite."','".$idService."','".$date."','".$prix."')";
	
	if($conn->exec($sql)){
		echo "Article commandé";
	}
	else{
		echo "Erreur";
	}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
