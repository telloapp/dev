<?php

class Client{

	private $db;
	public function __construct($database) {
	    $this->db = $database;
	}


	public function register($username, $password, $email, $contact){

		global $bcrypt; // making the $bcrypt variable global so we can use here
		
		$password   = $bcrypt->genHash($password);

		$query 	= $this->db->prepare("INSERT INTO `users` (`username`, `contacts`, `password`, `email`) VALUES (?, ?, ?, ?) ");

		$query->bindValue(1, $username);
		$query->bindValue(2, $contact);
		$query->bindValue(3, $password);
		$query->bindValue(4, $email);
		
	

		try{
			$query->execute();

			if ($query) {

                $target_path = "../$username/";
                if (!is_dir($target_path)) {
                    if (!mkdir($target_path, 0777, true)) {
                        echo 'Error creating user directory';
                        exit;
                    }
                }     
                	$siteUsername = '$username';

                	$datawrite = "<?php $siteUsername = '$username';\ninclude '../views/user_events.php'; ?>";

                    $filename = "../$username/index.php";
                    
                    $site_page = fopen($filename, "w");
                    
                    fwrite($site_page, $datawrite);
                    
                    fclose($site_page);

                $upload_path = "../$username/";

			}

			
		}catch(PDOException $e){
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
}
?>