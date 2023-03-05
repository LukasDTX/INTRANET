<?php
require_once('dbconfigu.php');
class crud
{
	private $conn;
	
	function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
	}
	
	public function create($katalog,$tlumaczenie,$plik,$data)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO katalog(katalog,tlumaczenie,plik,data) VALUES(:katalog, :tlumaczenie, :plik, :data)");
			$stmt->bindparam(":katalog",$katalog);
			$stmt->bindparam(":tlumaczenie",$tlumaczenie);
			$stmt->bindparam(":plik",$plik);
			$stmt->bindparam(":data",$data);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	/* paging */
	
	
	
}
