<?php 

class Users{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	
	
	
	public function change_password($user_id, $password) {

		global $bcrypt;

		/* Two create a Hash you do */
		$password_hash = $bcrypt->genHash($password);

		$query = $this->db->prepare("UPDATE `users` SET `password` = ? WHERE `id` = ?");

		$query->bindValue(1, $password_hash);
		$query->bindValue(2, $user_id);				

		try{
			$query->execute();
			return true;
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}

	public function change_email($user_id, $email) {


		$query = $this->db->prepare("UPDATE `users` SET `email` = ? WHERE `id` = ?");

		$query->bindValue(1, $email);
		$query->bindValue(2, $user_id);				

		try{
			$query->execute();
			return true;
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}	
	
	

	public function user_exists($username) {
	
		$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `username`= ?");
		$query->bindValue(1, $username);
	
		try{

			$query->execute();
			$rows = $query->fetchColumn();

			if($rows == 1){
				return true;
			}else{
				return false;
			}

		} catch (PDOException $e){
			die($e->getMessage());
		}

	}
	 
	public function email_exists($email) {

		$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `email`= ?");
		$query->bindValue(1, $email);
	
		try{

			$query->execute();
			$rows = $query->fetchColumn();

			if($rows == 1){
				return true;
			}else{
				return false;
			}

		} catch (PDOException $e){
			die($e->getMessage());
		}

	}

	public function register($username, $password, $email){

		global $bcrypt; // making the $bcrypt variable global so we can use here

		$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR']; // getting the users IP address
		$email_code = $email_code = uniqid('code_',true); // Creating a unique string.
		
		$password   = $bcrypt->genHash($password);

		$query 	= $this->db->prepare("INSERT INTO `users` (`username`, `password`, `email`, `ip`, `time`, `email_code`) VALUES (?, ?, ?, ?, ?, ?) ");

		$query->bindValue(1, $username);
		$query->bindValue(2, $password);
		$query->bindValue(3, $email);
		$query->bindValue(4, $ip);
		$query->bindValue(5, $time);
		$query->bindValue(6, $email_code);
	

		try{
			$query->execute();

			mail($email, 'Welcome to TelloApp.com', "Hello " . $username. ",\r\nThank you for registering with us.\r\nYour username is ".$username."\r\n Your Password is ".$password."\r\n\r\n-- Afrilisting Team");
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function login($username, $password) 
	{

		global $bcrypt;  // Again make get the bcrypt variable, which is defined in init.php, which is included in login.php where this function is called

		$query = $this->db->prepare("SELECT `password`, `id` FROM `users` WHERE `username` = ?");
		$query->bindValue(1, $username);

		try{
			
			$query->execute();
			$data 				= $query->fetch();
			$stored_password 	= $data['password']; // stored hashed password
			$id   				= $data['id']; // id of the user to be returned if the password is verified, below.
			
			if($bcrypt->verify($password, $stored_password) === true){ // using the verify method to compare the password with the stored hashed password.
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
		$query = $this->db->prepare("SELECT * FROM `users` WHERE id = ?");
		$query->bindValue(1,$id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}
	  	  	 
	public function get_users() 
	{

		$query = $this->db->prepare("SELECT * FROM `users` ORDER BY `time` DESC");
		
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchAll();
	}

	
	

	
	


	
}

?>