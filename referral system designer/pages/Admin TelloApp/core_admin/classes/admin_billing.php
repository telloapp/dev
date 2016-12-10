<?php

class Admin_billing{

	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function get_all_designers(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id FROM designer T1 INNER JOIN site_data T2 ON T1.id=T2.user_id WHERE (inprogress_status = 'Inprogress' AND cancel_status = 'Not Cancelled')");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	public function get_site_name($user_id){
		global $db;

	$query=$this->db->prepare("SELECT T1.id,T1.username, T2.id,T2.user_id,T2.site_name,T3.c_id,T3.user_id,T3.site_id,T3.payment_type,T3.date,T3.payment_method,T3.amount FROM designer T1 INNER JOIN site_data T2 ON T1.id = T2.user_id INNER JOIN client_payment T3 ON T2.id = T3.c_id WHERE T2.inprogress_status = 'Inprogress' AND T2.user_id = ?");
		 $query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}



	public function view_payment_inprogress($site_id,$c_id){
		global $db;

	$query=$this->db->prepare("SELECT T1.site_id,T1.c_id,T1.payment_type, T1.payment_method,T1.amount,T1.date FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id=T2.id WHERE T1.site_id =? AND T1.c_id =?");
		 $query->bindValue(1, $site_id);
		 $query->bindValue(2, $c_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}
	
public function get_all_designers_compltd(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id FROM designer T1 INNER JOIN site_data T2 ON T1.id=T2.user_id WHERE inprogress_status = 'Completed'");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	public function get_sitename_completed($user_id){
		global $db;

	$query=$this->db->prepare("SELECT T1.id,T1.username, T2.id,T2.user_id,T2.site_name,T3.c_id,T3.user_id,T3.site_id,T3.payment_type,T3.date,T3.payment_method,T3.amount FROM designer T1 INNER JOIN site_data T2 ON T1.id = T2.user_id INNER JOIN client_payment T3 ON T2.id = T3.c_id WHERE T2.inprogress_status = 'Completed' AND T2.user_id = ?");
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

	public function cancelled_inprogress(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id,T2.site_name FROM designer T1 INNER JOIN site_data T2 ON T1.id=T2.user_id WHERE (inprogress_status = 'Inprogress' AND cancel_status = 'Cancelled')");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	public function complete_cancelled_admin(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id,T2.site_name FROM designer T1 INNER JOIN site_data T2 ON T1.id=T2.user_id WHERE (inprogress_status = 'Completed' AND cancel_status = 'Cancelled')");
		 //$query->bindValue(1, $site_id);

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

	$query=$this->db->prepare("SELECT T1.site_id,T1.payment_method,T1.amount,T1.date FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id=T2.id WHERE (inprogress_status = 'Inprogress' AND cancel_status = 'Cancelled') AND T2.user_id =? ");
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

	public function cancel_site_complete($user_id){ 
		global $db;

	$query=$this->db->prepare("SELECT T1.site_id,T1.payment_method,T1.amount,T1.date FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id=T2.id WHERE (inprogress_status = 'Completed' AND cancel_status = 'Cancelled') AND T2.user_id =? ");
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

	public function designers_penalties(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id,T2.site_name,T3.days_missed,T4.amount FROM designer T1 INNER JOIN site_data T2 ON T1.id=T2.user_id INNER JOIN penalties T3 ON T2.id = T3.site_id INNER JOIN client_payment T4 ON T3.site_id = T4.site_id WHERE inprogress_status = 'Completed' GROUP BY T1.username");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	public function list_payment_tello(){
		global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id,T2.site_name,T3.amount FROM designer T1 INNER JOIN site_data T2 ON T1.id=T2.user_id INNER JOIN client_payment T3 ON T2.id=T3.site_id WHERE inprogress_status = 'Completed' GROUP BY T1.username");
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
?>