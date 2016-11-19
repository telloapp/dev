<?php

class Client{

	private $db;
	public function __construct($database) {
	    $this->db = $database;
	}
	public function viewCriteria()
	{
		$query = $this->db->prepare("SELECT * FROM criteria");

		try{
			$query->execute();
			return $query->fetchAll();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function addRatings($user_id,$designer_id,$site_id,$ratings,$comments)
	{ $f=0;

		foreach($_POST['ratings'] as $ratings) {
		
			
		$query = $this->db->prepare("INSERT INTO `ratings`(user_id,designer_id,site_id,ratings,comments) VALUES (?,?,?,?,?)");
		$query->bindValue(1,$user_id);
		$query->bindValue(2,$designer_id);
		$query->bindValue(3,$site_id);
		
		$query->bindValue(4,$ratings);
		$query->bindValue(5,$comments);
		$f++;
		try{
			$query->execute();			
		} catch(PDOException $e){
			die($e->getMessage());
		}
	
}
	}
	public function getAvgScore($site_id)
	{
		$query = $this->db->prepare("SELECT SUM(ratings) AS total FROM ratings WHERE site_id = ?");
		$query->bindValue(1,$site_id);

		try{
			$query->execute();
			return $query->fetchAll();			
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function countRatings($site_id)
	{
		$query = $this->db->prepare("SELECT * FROM ratings WHERE site_id = ?");
			$query->bindValue(1,$site_id);

		try{
			$query->execute();
			return $query->fetchAll();			
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}


}
?>

		