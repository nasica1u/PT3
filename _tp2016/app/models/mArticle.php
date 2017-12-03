<?php
require "mDataBase.php";
class Article
{
	private $_idnum = 0;
	private $_designation = "";
	private $_quantite = "";
	private $_date = "";
	private $_prix = "";
	private $_idCmd = "";
	public function  __construct(array $args)
	{
		$aRes = self::isNew($args["designation"]); 
		if ($aRes==0)
		{
			if (isset($args["idnum"])) $this->_idnum = $args["idnum"]; else $this->_idnum = 0;
			if (isset($args["designation"])) $this->_designation = strtolower($args["designation"]); else $this->_designation = "article";
			if (isset($args["quantite"])) $this->_quantite = $args["quantite"]; else $this->_quantite = 0;
			if (isset($args["date"])) $this->_date = $args["date"]; else $this->_date = "2016-01-01";
			if (isset($args["prix"])) $this->_prix = $args["prix"]; else $this->_prix = 0;
			if (isset($args["idCmd"])) $this->_idCmd = $args["idCmd"]; else $this->_idCmd = 0;
			$args = ['idnum' => $this->_idnum,
					  'designation' => $this->_designation,
					  'date' => $this->_date,
					  'prix' => $this->_prix,
					  'quantite' => $this->_quantite,
					  'idCmd' => $this->_idCmd];
			self::save($args);
		}
		else
		{
			$this->_idnum = $aRes["idnum"];
			$this->_designation = strtolower($aRes["designation"]);
			$this->_quantite = $aRes["quantite"];
			$this->_date = $aRes["date"];
			$this->_prix = $aRes["prix"];
			$this->_idCmd = $aRes["iddcom"];
		}
	}
	public static function isNew($value)
	{
		$conn = $conn = myConnection();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM tp_article where designation LIKE '".strtolower($value)."'");
		$stmt->execute();
		$rows = $stmt->fetchAll();
		$conn = null;
		//var_dump($rows[0]);
		if (count($rows))
		{
			return $rows[0];
		}
		else return 0;
	}
	public function idnum()
	{
		return $this->_idnum;
	}
	public function designation()
	{
		return $this->_designation;
	}
	public function quantite()
	{
		return $this->_quantite;
	}
	public function prix()
	{
		return $this->_prix;
	}
	public function maDate()
	{
		return $this->_date;
	}
	public function setIdnum($value)
	{
		$this->_idnum = $value;
	}
	public function setDesignation($value)
	{
		$this->_Designation = $value;
	}
	public function setDate($value)
	{
		$this->_date = $value;
	}
	public function setQuantite($value)
	{
		$this->_quantite = $value;
	}
	public function setPrix($value)
	{
		$this->_prix = $value;
	}
	public static function save(array $value)
	{
		$sql = "INSERT INTO tp_article (idnum, designation, quantite, date, prix, iddcom) VALUES 
		(NULL, '".$value['designation']."', '".$value['quantite']."', '".$value['date']."', '".$value['prix']."', '".$value['idCmd']."')";
		$conn = myConnection();
		$conn->exec($sql);
		$conn = null;
	}
	public function update()
	{
		$sql = "UPDATE tp_article SET designation='".$this->_designation."', quantite='".$this->_quantite."', date='".$this->_date."' where idnum = ".$this->_idnum;
		$conn = myConnection();
		$conn->exec($sql);
		$conn = null;
	}
	public function __toString()
	{
		$print = "Article : ".$this->_designation;
		$print .= "</br>ID : ".$this->_idnum;
		$print .= "</br>Quantite : ".$this->_quantite;
		$print .= "</br>Prix : ".$this->_prix;
		$print .= "</br>Date : ".$this->_date;
		$print .= "</br>Commande : ".$this->_idCmd;
		return $print;
	}
}

// TEST
/*
$donnees = [
  'designation' => 'saucisses',
  'date' => '2016-11-28',
  'prix' => '2',
  'quantite' => '7',
  'idCmd' => '1'
];
$test = new Article($donnees);
$test->setQuantite(12);
$test->update();
echo $test;
//$test->save();
//$test->isNew("communication");
*/