<?php

try {
 	$conn = myConnection();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT nom FROM tp_fournisseur");
    $stmt->execute();

    // set the resulting array to associative
	echo "<select id='fournisseur'>";
	while ($u = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<option>";
		echo $u['nom'];
		echo "</option>";
	}
	echo "</select>";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
