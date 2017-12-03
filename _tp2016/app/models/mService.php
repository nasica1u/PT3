<?php
require "mDataBase.php";
class Service
{
	private $_idd = 0;
	private $_libelle = "default";
	private $_date = "";
	public function  __construct(array $args)
	{
		$aRes = self::isNew($args["libelle"]); 
		if ($aRes==0)
		{
			$this->_libelle = $args["libelle"];
			self::save($args["libelle"]);
		}
		else
		{
			$this->_idd = $aRes['idd'];
			$this->_libelle = $aRes['libelle'];
			$this->_date = $aRes['date'];
		}
	}
	public static function isNew($value)
	{
		$conn = $conn = myConnection();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM tp_service where libelle LIKE '".$value."'");
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
	public function idd()
	{
		return $this->_idd;
	}
	public function libelle()
	{
		return $this->_libelle;
	}
	public function setIdd($value)
	{
		$this->_idd = $value;
	}
	public function setLibelle($value)
	{
		$this->_libelle = $value;
	}
	public static function save($value)
	{
		$sql = "INSERT INTO tp_service (idd, libelle, date) VALUES (NULL, '".$value."', CURRENT_TIMESTAMP)";
		$conn = myConnection();
		$conn->exec($sql);
		$conn = null;
	}
	public function update()
	{
		$sql = "UPDATE tp_service SET libelle='".$this->_libelle."' where idd = ".$this->_idd;
		$conn = myConnection();
		$conn->exec($sql);
		$conn = null;
	}
	public function __toString()
	{
		$print = "Service : ".$this->_libelle;
		$print .= "</br>ID : ".$this->_idd;
		$print .= "</br>Date : ".$this->_date;
		return $print;
	}
}

// TEST
/*
$donnees = [
  'idd' => 16,
  'libelle' => 'restauration',
];
$test = new Service($donnees);
$test->setLibelle("location");
$test->update();
echo $test;
//$test->save();
//$test->isNew("communication");
*/