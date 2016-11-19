<?php

class billing{

	private $db;
	public function __construct($database){
		$this->db = $database;
	}


public function get_site_name($user_id){
		global $db;

	$query=$this->db->prepare("SELECT * FROM site_data T1 INNER JOIN client_payment T2 ON T1.id=T2.id WHERE status = 'inprogress' AND T1.user_id =?");
		 $query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}


	}

	public function view_payment_inprogress($id,$user_id){
		global $db;

	$query=$this->db->prepare("SELECT T1.site_id,T1.id,T1.payment_type, T1.payment_method,T1.amount,T1.date FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id=T2.id WHERE T1.site_id =? AND T2.user_id =?");
		 $query->bindValue(1, $id);
		 $query->bindValue(2, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}


	}

	public function viewBiz()
	{
		$query = $this->db->prepare("SELECT * FROM biz_profile");

		try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}

	}

	public function all_site_data()
	{
		$query = $this->db->prepare("SELECT * FROM site_data");

		try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}

	}


	public function site_completed($user_id){
		global $db;

	$query=$this->db->prepare("SELECT T1.site_name,T1.user_id,T1.id FROM site_data T1 INNER JOIN designer T2 ON T1.user_id = T2.id WHERE status = 'complete' AND user_id =? ");
		 $query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}


	}

	public function view_payment_complete($id){ 
		global $db;

	$query=$this->db->prepare("SELECT T1.payment_type,T1.payment_method,T1.amount,T1.date FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id = T2.id WHERE (payment_type = 'Deposit' || payment_type = 'Full Amount') AND T2.id = ?");
		 $query->bindValue(1, $id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	public function view_payment_completeBalnce($id){
		global $db;

	$query=$this->db->prepare("SELECT T1.payment_type,T1.payment_method,T1.amount,T1.date FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id = T2.id WHERE payment_type = 'Balance'  AND T2.id = ?");
		 $query->bindValue(1, $id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}


	}

	public function view_payment_tello($id){
		global $db;

	$query=$this->db->prepare("SELECT * FROM client_payment WHERE id =?");
		 $query->bindValue(1, $id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}


	}

	public function site_cancelled($user_id){
		global $db;

	$query=$this->db->prepare("SELECT T1.site_name,T1.user_id,T1.id FROM site_data T1 INNER JOIN designer T2 ON T1.user_id = T2.id WHERE status = 'cancelled' AND T1.user_id =? ");
		 $query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}


	}

	public function view_payment_cancelled($id,$user_id){
		global $db;

	$query=$this->db->prepare("SELECT * FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id=T2.id WHERE T1.site_id =? AND T2.user_id = ?");
		 $query->bindValue(1, $id);
		 $query->bindValue(2, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	public function view_penalties($user_id){
		global $db;

	$query=$this->db->prepare("SELECT * FROM site_data T1 INNER JOIN client_payment T2 ON T1.id=T2.id WHERE status = 'complete' AND T1.user_id =?");
		 $query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	public function see_penalties($id,$user_id){
		global $db;

	$query=$this->db->prepare("SELECT T1.id, T1.days_missed, T1.price, T1.site_id FROM penalties T1 INNER JOIN site_data T2 ON T1.site_id=T2.id WHERE T1.site_id=? AND T1.user_id=?");
		 $query->bindValue(1, $id);
		 $query->bindValue(2, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}


	public function cancel_site_inprogress($user_id){ 
		global $db;

	$query=$this->db->prepare("SELECT T1.site_id,T1.payment_method,T1.amount,T1.date FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id=T2.id WHERE status = 'cancel_inprogress' AND T2.user_id =? ");
		 //$query->bindValue(1, $id);
		 $query->bindValue(1, $user_id);

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