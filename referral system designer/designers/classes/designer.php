<?php 
class designer
{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}


		public function register($username, $password, $email,$contacts,$website,$d_origin)
		   {

				global $bcrypt; // making the $bcrypt variable global so we can use here

				//$time 		= time();
				//$ip 		= $_SERVER['REMOTE_ADDR']; // getting the users IP address
				//$email_code = $email_code = uniqid('code_',true); // Creating a unique string.
				
				//$password   = $bcrypt->genHash($password);

				$query 	= $this->db->prepare("INSERT INTO `designer` (`username`,`password`, `email`,`contacts`,`website`,`d_origin`) VALUES (?, ?, ?, ?, ? ,?) ");

				$query->bindValue(1, $username);
				$query->bindValue(2, $password);
				$query->bindValue(3, $email);
				$query->bindValue(4, $contacts);
				$query->bindValue(5, $website);
				$query->bindValue(6, $d_origin);
				

				try
				{
					$query->execute();
				}

				catch(PDOException $e)
				{
					die($e->getMessage());
				}	
			}

			public function login($username, $password) 
			{

				global $bcrypt;  // Again make get the bcrypt variable, which is defined in init.php, which is included in login.php where this function is called

				$query = $this->db->prepare("SELECT `id`,`password` FROM `designer` WHERE `username` = ?");
				$query->bindValue(1, $username);

				try{
					
					$query->execute();
					$data 				= $query->fetch();
					$stored_password 	= $data['password']; // stored hashed password
					$id   				= $data['id']; // id of the user to be returned if the password is verified, below.
					
					if(($password == $stored_password)){ // using the verify method to compare the password with the stored hashed password.
						return $id;	// returning the user's id.
					}else{
						return false;	
					}

				}catch(PDOException $e){
					die($e->getMessage());
				}
	
	       }

	       public function userdata($id) 
	       {

				$query = $this->db->prepare("SELECT * FROM `designer` WHERE `id`= ?");
				$query->bindValue(1, $id);

				try{

					$query->execute();

					return $query->fetch();

				} catch(PDOException $e){

					die($e->getMessage());
				}

		   }


		   public function get_site_name(){
		global $db;

	$query=$this->db->prepare("SELECT * FROM site_data WHERE progress_status = 'inprogress'");
		

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}


	}

	public function view_payment_inprogress($id){
		global $db;

	$query=$this->db->prepare("SELECT T1.site_id,T1.c_id,T1.payment_type, T1.payment_method,T1.amount,T1.date FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id=T2.id WHERE T1.site_id =?");
		 $query->bindValue(1, $id);
		 //$query->bindValue(2, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}


	}

	/*public function viewBiz()
	{
		$query = $this->db->prepare("SELECT * FROM biz_profile");

		try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}

	}*/

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


	public function site_completed(){
		global $db;

	$query=$this->db->prepare("SELECT * FROM site_data   WHERE progress_status = 'completed'");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}



	}

	public function view_payment_complete($site_id){ 
		global $db;

	$query=$this->db->prepare("SELECT T1.payment_type,T1.payment_method,T1.amount,T1.date FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id = T2.id WHERE (payment_type = 'Deposit' || payment_type = 'Full Amount') AND T2.progress_status = 'Completed' AND T1.site_id = ?");
		 $query->bindValue(1, $site_id);

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

	$query=$this->db->prepare("SELECT DISTINCT T1.username,T1.id FROM designer T1 INNER JOIN site_data T2 ON T1.id=T2.user_id WHERE progress_status = 'completed'");
		 //$query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	public function view_payment_completeBalnce($site_id){
		global $db;

	$query=$this->db->prepare("SELECT T1.payment_type,T1.payment_method,T1.amount,T1.date FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id = T2.id WHERE payment_type = 'Balance'  AND T1.site_id = ?");
		 $query->bindValue(1, $site_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}


	}

	public function view_payment_tello($site_id){
		global $db;

	$query=$this->db->prepare("SELECT * FROM client_payment WHERE site_id = ?");
		 $query->bindValue(1, $site_id);
		 //$query->bindValue(2, $user_id);

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

	$query=$this->db->prepare("SELECT T1.site_name,T1.user_id,T1.id FROM site_data T1 INNER JOIN designer T2 ON T1.user_id = T2.id WHERE progress_status = 'Completed' AND T1.user_id =? ");
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

	$query=$this->db->prepare("SELECT * FROM site_data T1 INNER JOIN client_payment T2 ON T1.id=T2.c_id WHERE progress_status = 'complete' AND T1.user_id =?");
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


	public function cancel_site_inprogress(){ 
		//global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.site_id,T1.payment_method,T1.amount,T1.date,T2.site_name FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id=T2.id WHERE progress_status = 'Inprogress' AND cancel_status = 'cancelled'");
		 //$query->bindValue(1, $id);
		// $query->bindValue(1, $user_id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
	}

	public function cancel_site_completed(){ 
		//global $db;

	$query=$this->db->prepare("SELECT DISTINCT T1.site_id,T1.payment_method,T1.amount,T1.date,T2.site_name FROM client_payment T1 INNER JOIN site_data T2 ON T1.site_id=T2.id WHERE progress_status = 'completed' AND cancel_status = 'cancelled'");
		 //$query->bindValue(1, $id);
		// $query->bindValue(1, $user_id);

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