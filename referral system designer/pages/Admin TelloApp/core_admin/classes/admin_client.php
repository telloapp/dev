<?php 
class admin_client{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}
public function show_all_completed_client(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id ,T2.user_id FROM users T1 INNER JOIN site_data T2 ON T1.id=T2.user_id  WHERE (inprogress_status = 'Completed' AND cancell_status = 'Not Cancelled')");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

public function show_client_inprogress(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id,T2.user_id FROM users T1 INNER JOIN site_data T2 ON T1.id=T2.user_id WHERE inprogress_status = 'Inprogress'");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}


public function show_client_cancelled_site(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id FROM users T1 INNER JOIN site_data T2 ON T1.id=T2.user_id  WHERE cancell_status = 'Cancelled' ");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

public function show_client_approved_site(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id FROM users T1 INNER JOIN site_data T2 ON T1.id=T2.user_id  WHERE inprogress_status = 'Approved' ");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	public function show_all_revisions(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id,T2.site_id FROM users T1 INNER JOIN revision T2 ON T1.id=T2.client_id  ");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

public function show_all_complains(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id FROM users T1 INNER JOIN client_complaints T2 ON T1.id=T2.client_id  ");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	

	
}
