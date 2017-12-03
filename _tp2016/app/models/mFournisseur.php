<?php
require "mDataBase.php";
class Fournisseur
{
	private $_idd = 0;
	private $_nom = "default";
	private $_adresse = "";
	private $_telephone = "";
	public function  __construct(array $args)
	{
		$aRes = self::isNew($args["nom"]); 
		if ($aRes==0)
		{
			$this->_nom = $args["nom"];
			$this->_adresse = $args["adresse"];
			$this->_telephone = $args["telephone"];
			self::save($args);
		}
		else
		{
			$this->_idd = $aRes['idd'];
			$this->_nom = $aRes['nom'];
			$this->_adresse = $aRes['adresse'];
			$this->telephone = $aRes['telephone'];
		}
	}
	public static function isNew($value)
	{
		$conn = $conn = myConnection();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM tp_fournisseur where nom LIKE '".$value."'");
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
	public function nom()
	{
		return $this->_nom;
	}
	public function adresse()
	{
		return $this->_adresse;
	}
	public function telephone()
	{
		return $this->_telephone;
	}
	public function setIdd($value)
	{
		$this->_idd = $value;
	}
	public function setNom($value)
	{
		$this->_nom = $value;
	}
	public function setAdresse($value)
	{
		$this->_adresse = $value;
	}
	public function setTelephone($value)
	{
		$this->_Telephone = $value;
	}
	public static function save(array $value)
	{
		$sql = "INSERT INTO tp_fournisseur (idd, nom, adresse, telephone) VALUES (NULL, '".$value['nom']."', '".$value['adresse']."', '".$value['telephone']."')";
		$conn = myConnection();
		$conn->exec($sql);
		$conn = null;
	}
	public function update()
	{
		$sql = "UPDATE tp_fournisseur SET nom='".$this->_nom."', adresse='".$this->_adresse."', telephone='".$this->_telephone."' where idd = ".$this->_idd;
		$conn = myConnection();
		$conn->exec($sql);
		$conn = null;
	}
	public function __toString()
	{
		$print = "Fournisseur : ".$this->_nom;
		$print .= "</br>ID : ".$this->_idd;
		$print .= "</br>Adresse : ".$this->_adresse;
		$print .= "</br>Telephone : ".$this->_telephone;
		return $print;
	}
}

// TEST
/*
$donnees = [
  'idd' => 7,
  'nom' => 'AlloBureau',
  'adresse' => 'vers labas',
  'telephone' => '0495007007',
];
$test = new Fournisseur($donnees);
$test->setAdresse("vers ici");
$test->update();
echo $test;
//$test->save();
//$test->isNew("communication");
*/