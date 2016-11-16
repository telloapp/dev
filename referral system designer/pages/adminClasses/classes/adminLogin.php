<?php

class adminLogin{

	private $db;
	public function __construct($database) {
	    $this->db = $database;
	}

	public function userdata($id){
		$query = $this->db->prepare("SELECT * FROM `admin` WHERE id = ?");
		$query->bindValue(1,$id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

public function listClients() {
	global $db;
		$query = $this->db->prepare("SELECT * FROM `users`");
		try{
			$query->execute();
			return $query->fetchAll();
		
		} catch (PDOException $e){
			die($e->getMessage());
		}
	}

		public function viewSelectedOutbox($id)
	{
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE `user_id` = ? GROUP BY `id`");

		$query->bindValue(1,$id);
				try{
			$query->execute();
			return $query->fetchAll();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
		public function viewPages($id)
	{
		$query = $this->db->prepare("SELECT * FROM features t1 INNER JOIN selected_features t2 ON t1.id = t2.feature_id WHERE t2.id = ?");

		$query->bindValue(1,$id);
				try{
			$query->execute();
			return $query->fetchAll();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
		public function viewSend($id){
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE `status` = 'sent' AND user_id=?");
		$query->bindValue(1,$id);
			try{
			$query->execute();
			return $query->fetchAll();
		} catch(PDOException $e){
			die($e->getMessage());
		}
}

}
?>