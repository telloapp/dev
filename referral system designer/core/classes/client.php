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


		public function list_features(){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM `features` ");

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function insert_siteData($user_id,$site_type,$status,$origin,$site_name,$due_date,$no_of_pages,$features,$facebook,$twitter,$instagram)
	{
		$query = $this->db->prepare("INSERT INTO `site_data`(`user_id`,`website_type`,`status`,`origin`,`site_name`,`due_date`,`no_of_pages`,`features`,`facebook`,`twitter`,`instagram`) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
		$query->bindValue(1,$user_id);
		$query->bindValue(2,$site_type);
		$query->bindValue(3,$status);
		$query->bindValue(4,$origin);
		$query->bindValue(5,$site_name);
		$query->bindValue(6,$due_date);
		$query->bindValue(7,$no_of_pages);
		$query->bindValue(8,$features);
		$query->bindValue(9,$facebook);
		$query->bindValue(10,$twitter);
		$query->bindValue(11,$instagram);

	try
	{
		$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	
	public function viewSend($id)
	{
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE `status` = 'send' AND user_id=?");
		$query->bindValue(1,$id);

			try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}

		public function viewDrafts($id)
	{
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE `status` = 'draft' AND user_id=?");
		$query->bindValue(1,$id);

			try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}

	public function viewSelectedDraft($id)
	{
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE `status` = 'draft' AND id=?");
		$query->bindValue(1,$id);

			try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}

	public function dlt_drafts($id)
	{
		$query = $this->db->prepare("DELETE FROM `site_data` WHERE `id` = ? AND `status` = 'draft'");
		$query->bindValue(1,$id);
				try{
			$query->execute();
		} catch(PDOException $e){

			die($e->getMessage());
		}
	}

		public function viewSelectedOutbox($id)
	{
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE `id` = ? AND `status` = 'send'");
		$query->bindValue(1,$id);
				try{
			$query->execute();
			return $query->fetchAll();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function dlt_outbox($outboxId)
	{
		$query = $this->db->prepare("DELETE FROM `site_data` WHERE `id` = ? AND `status` = 'send'");
		$query->bindValue(1,$outboxId);
				try{
			$query->execute();
		} catch(PDOException $e){

			die($e->getMessage());
		}
	}

	public function update_outbox($id,$user_id,$website_type,$status,$origin,$site_name,$due_date,$no_of_pages,$features,$facebook,$twitter,$instagram)
	{
		$query = $this->db->prepare("UPDATE `site_data` SET `user_id` = ?, `website_type` = ?, `status` = ?, origin = ?, `site_name` = ?,`due_date` = ?,`no_of_pages` = ?, `features` = ?, `facebook` = ?, `twitter` = ?, `instagram` = ? WHERE `id` = ? AND status = ?");


		$query->bindValue(1,$user_id);
		$query->bindValue(2,$website_type);
		$query->bindValue(3,$status);
		$query->bindValue(4,$origin);
		$query->bindValue(5,$site_name);
		$query->bindValue(6,$due_date);
		$query->bindValue(7,$no_of_pages);
		$query->bindValue(8,$features);
		$query->bindValue(9,$facebook);
		$query->bindValue(10,$twitter);
		$query->bindValue(11,$instagram);
		$query->bindValue(12,$id);
		$query->bindValue(13,$status);


		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function save_outbox($user_id,$site_type,$status,$origin,$site_name,$due_date,$no_of_pages,$features,$facebook,$twitter,$instagram)
	{

		$query = $this->db->prepare("UPDATE `site_data` SET `user_id` = ?, `website_type` = ?, `status` = ?, origin = ?, `site_name` = ?,`due_date` = ?,`no_of_pages` = ?, `features` = ?, `facebook` = ?, `twitter` = ?, `instagram` = ? WHERE `id` = ? AND status = 'send'");


		$query->bindValue(1,$user_id);
		$query->bindValue(2,$website_type);
		$query->bindValue(3,$status);
		$query->bindValue(4,$origin);
		$query->bindValue(5,$site_name);
		$query->bindValue(6,$due_date);
		$query->bindValue(7,$no_of_pages);
		$query->bindValue(8,$features);
		$query->bindValue(9,$facebook);
		$query->bindValue(10,$twitter);
		$query->bindValue(11,$instagram);
		$query->bindValue(12,$id);
	


		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}



}
?>