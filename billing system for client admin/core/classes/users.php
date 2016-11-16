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

	public function register($username, $password, $email, $contacts){

		global $bcrypt; // making the $bcrypt variable global so we can use here

		
		
		$password   = $bcrypt->genHash($password);

		$query 	= $this->db->prepare("INSERT INTO `users` (`username`, `password`, `email`, `contacts`) VALUES (?, ?, ?, ?) ");

		$query->bindValue(1, $username);
		
		$query->bindValue(2, $password);
		$query->bindValue(3, $email);
		$query->bindValue(4, $contacts);
		
	

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

	
	public function insertuserInfo($user_id,$name, $email, $website, $video_link, $contact, $province, $city, $surbub, $genre, $reference, $price, $listing_type) 
	{
		$query = $this->db->prepare("INSERT INTO `music_app` (`user_id`,`name`,`email`,`website`,`video_link`,`contact`,`province`,`city`,`surbub`,`genre`,`reference`,`price`,`listing_type`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");


		$query->bindValue(1, $user_id);
		$query->bindValue(2, $name);
		$query->bindValue(3, $email);
		$query->bindValue(4, $website);
		$query->bindValue(5, $video_link);
		$query->bindValue(6, $contact);
		$query->bindValue(7, $province);
		$query->bindValue(8, $city);
		$query->bindValue(9, $surbub);
		$query->bindValue(10, $genre);
		$query->bindValue(11, $reference);
		$query->bindValue(12, $price);
		$query->bindValue(13, $listing_type);
	
	try
	{
		$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}

	}

	public function addimage($user_id, $file_name){
		
if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		
          $query	= $this->db->prepare("INSERT INTO `images` (`user_id`,`files`) VALUES (?,?)");


        $query->bindValue(1, $user_id);		
		$query->bindValue(2, $file_name);
				
		

		try {
			$query->execute();
			  header('Location:view_info.php'.$_SERVER['REQUEST_URL']);


		} catch (PDOException $e) {

			die($e->getMessage());
		}

        $desired_dir="gallery";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		 			
        }else{
                print_r($errors);
        }
    }
	
}
	}

	public function viewinfo($id)
	{
		$query = $this->db->prepare("SELECT * FROM `music_app` WHERE `user_id` = ?");
		$query->bindValue(1,$id);

		try{

			$query->execute();

			return $query->fetchAll();
			 

		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function deleteinfo($id)
	{
		$query = $this->db->prepare("DELETE FROM music_app WHERE `id` = ?");
		$query->bindValue(1, $id);

		try{
			
			$query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function displAll($id)
	{
		$query = $this->db->prepare("SELECT * FROM music_app WHERE `id` = ?");
		$query->bindValue(1,$id);

		try{

			$query->execute();

			return $query->fetchAll();
			 

		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function updateinfo($id,$name, $email, $website, $video_link, $contact, $province, $city, $surbub, $genre, $reference, $price, $listing_type)
	{

		$query = $this->db->prepare("UPDATE `music_app` SET `name` = ?, `email` = ?, `website` = ?, `video_link` = ?,`contact` = ?, `province` = ?, `city` = ?, `surbub` = ?, `genre` = ?, `reference` = ?, `price` = ?, `listing_type` = ? WHERE `id` = ?");

		$query->bindValue(1,$name);
		$query->bindValue(2,$email);
		$query->bindValue(3,$website);
		$query->bindValue(4,$video_link);
		$query->bindValue(5,$contact);
		$query->bindValue(6,$province);
		$query->bindValue(7,$city);
		$query->bindValue(8,$surbub);
		$query->bindValue(9,$genre);
		$query->bindValue(10,$reference);
		$query->bindValue(11,$price);
		$query->bindValue(12,$listing_type);
		$query->bindValue(13,$id);

		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}



	}




	
}

?>