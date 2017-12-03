<?php

require "../models/mDataBase.php";

try {
 	$conn = $conn = myConnection();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT idnum, designation, quantite FROM tp_article");
    $stmt->execute();

    // set the resulting array to associative
	echo "<select name='designation'>";
	while ($u = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<option onClick='alert(".$u['quantite'].");' 
				id='".$u['idnum']."' name='".$u['idnum']."'>";
		//echo "<i>".$u['designation']."</i> [quantité retirable : ".$u['quantite']."]";
		echo $u['designation'];
		echo "</option>";
	}
	echo "</select>";
	echo "<div id='toto'></div>";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
