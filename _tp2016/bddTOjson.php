<?php

require_once '../models/mArticle.php';

$pdoArticle = PdoBDD::monPdo();
$req = "SELECT * FROM Article";
$rs = $pdoArticle->query($req);
$results=$rs->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
indent($json);

$pdoCommande= PdoBDD::monPdo();
$req = "SELECT * FROM Commande";
$rs = $pdoArticle->query($req);
$results=$rs->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
indent($json);

$pdoFournisseur = PdoBDD::monPdo();
$req = "SELECT * FROM Fournisseur";
$rs = $pdoArticle->query($req);
$results=$rs->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
indent($json);

$pdoService= PdoBDD::monPdo();
$req = "SELECT * FROM Service";
$rs = $pdoArticle->query($req);
$results=$rs->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
indent($json);

function indent($json){
$result = '';
$pos = 0;
$strLen = strlen($json);
$indentStr = "\t";
$newLine = "\n";

for ($i = 0; $i < $strLen; $i++) {
	$char = $json[$i];

	if ($char == '"') {
		if (!preg_match('`"(\\\\\\\\|\\\\"|.)*?"`s', $json, $m, null, $i))
		return $json;

	$result .= $m[0];
	$i += strLen($m[0]) - 1;
	continue;
	}
	else if ($char == '}' || $char == ']') {
		$result .= $newLine;
		$pos --;
		$result .= str_repeat($indentStr, $pos);
	}

	$result .= $char;

	if ($char == ',' || $char == '{' || $char == '[') {
		$result .= $newLine;
		if ($char == '{' || $char == '[') {
			$pos ++;
		}

		$result .= str_repeat($indentStr, $pos);
	}
}

$my_file = '../../public/files/bddJSON.txt';
$handle = fopen($my_file,"a+") or die('Cannot open file:  '.$my_file);
fwrite($handle, $result."\n");
fclose($handle);

}

?>