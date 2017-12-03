<?php

require "../models/mDataBase.php";

try {
 	$conn = myConnection();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT designation, prix FROM tp_article");
    $stmt->execute();

	$result = array();
	while ($u = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[$u['designation']] = $u['prix'];
	}
	echo json_encode($result);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
