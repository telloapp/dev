<?php 
class client_payment_admin{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	

	public function all_pending1(){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM client_payment t1 INNER JOIN users t2 ON t1.user_id=t2.id INNER JOIN tbl_uploads t3 ON t3.c_id = t1.c_id WHERE t1.client_status = 'Pending'  ");
		
	

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}	
	
}


?>