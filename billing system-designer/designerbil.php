<?php

class designerbil{

	private $db;

	public function __construct($database){
		$this->db = $database;
	}


public function get_site_name(){
		global $db;

	$query=$this->db->prepare("SELECT site_name FROM site_data WHERE user_id = ?");
		 $query->bindValue(1, $id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}


	}


}
?>