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

	public function insert_siteData($user_id,$site_type,$status,$origin,$site_name,$due_date,$no_of_pages,$facebook,$twitter,$instagram)
	{
		$query = $this->db->prepare("INSERT INTO `site_data`(`user_id`,`website_type`,`status`,`origin`,`site_name`,`due_date`,`no_of_pages`,`facebook`,`twitter`,`instagram`) VALUES(?,?,?,?,?,?,?,?,?,?)");
		$query->bindValue(1,$user_id);
		$query->bindValue(2,$site_type);
		$query->bindValue(3,$status);
		$query->bindValue(4,$origin);
		$query->bindValue(5,$site_name);
		$query->bindValue(6,$due_date);
		$query->bindValue(7,$no_of_pages);		
		$query->bindValue(8,$facebook);
		$query->bindValue(9,$twitter);
		$query->bindValue(10,$instagram);

	try
	{
		$query->execute();
		$id = $this->db->lastInsertId();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		header('Location:Add_features.php?id='.$id);
	}

/*functio to insert site id into business profile table*/
	public function insertId($site_id,$id)
	{
		$query=$this->db->prepare("UPDATE business_profile t1 INNER JOIN site_data t2 SET t1.site_id = ? WHERE t2.id = ?");
		$query->bindValue(1,$site_id);
		$query->bindValue(2,$id);
		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	
	public function viewSend($id)
	{
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE `status` = 'sent' AND user_id=?");
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
		$query = $this->db->prepare("SELECT * FROM site_data WHERE id = ?");

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

	public function update_outbox($id,$user_id,$website_type,$status,$origin,$site_name,$due_date,$no_of_pages,$facebook,$twitter,$instagram)
	{
		$query = $this->db->prepare("UPDATE `site_data` SET `user_id` = ?, `website_type` = ?, `status` = ?, origin = ?, `site_name` = ?,`due_date` = ?,`no_of_pages` = ?,`facebook` = ?, `twitter` = ?, `instagram` = ? WHERE `id` = ?");
		$query->bindValue(1,$user_id);
		$query->bindValue(2,$website_type);
		$query->bindValue(3,$status);
		$query->bindValue(4,$origin);
		$query->bindValue(5,$site_name);
		$query->bindValue(6,$due_date);
		$query->bindValue(7,$no_of_pages);
		$query->bindValue(8,$facebook);
		$query->bindValue(9,$twitter);
		$query->bindValue(10,$instagram);
		$query->bindValue(11,$id);
	try
	{
		$query->execute();
				
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		header('Location:edit_features.php?id='.$id);
	}
	
	public function save_outbox($user_id,$website_type,$status,$origin,$site_name,$due_date,$no_of_pages,$facebook,$twitter,$instagram)
	{

		$query = $this->db->prepare("INSERT INTO `site_data`(`user_id`, `website_type`, `status`, origin, `site_name`,`due_date`,`no_of_pages`, `facebook`, `twitter`, `instagram`) VALUES(?,?,?,?,?,?,?,?,?,?)");


		$query->bindValue(1,$user_id);
		$query->bindValue(2,$website_type);
		$query->bindValue(3,$status);
		$query->bindValue(4,$origin);
		$query->bindValue(5,$site_name);
		$query->bindValue(6,$due_date);
		$query->bindValue(7,$no_of_pages);
		$query->bindValue(8,$facebook);
		$query->bindValue(9,$twitter);
		$query->bindValue(10,$instagram);
		
		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}

	public function update_send_draft($outboxid,$user_id,$website_type,$status,$origin,$site_name,$due_date,$no_of_pages,$facebook,$twitter,$instagram)
	{

		$query = $this->db->prepare("UPDATE `site_data` SET `user_id` = ?, `website_type` = ?, `status` = ?, origin = ?, `site_name` = ?,`due_date` = ?,`no_of_pages` = ?, `facebook` = ?, `twitter` = ?, `instagram` = ? WHERE `id` = ? AND status = 'draft'");

		$query->bindValue(1,$user_id);
		$query->bindValue(2,$website_type);
		$query->bindValue(3,$status);
		$query->bindValue(4,$origin);
		$query->bindValue(5,$site_name);
		$query->bindValue(6,$due_date);
		$query->bindValue(7,$no_of_pages);
		$query->bindValue(8,$facebook);
		$query->bindValue(9,$twitter);
		$query->bindValue(10,$instagram);
		$query->bindValue(11,$outboxid);
		
			try
	{
		$query->execute();
		
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		header('Location:edit_drafts_features.php?id='.$outboxid);
	}

		public function dlt_features($request_id)
	{
		$query=$this->db->prepare("DELETE FROM `selected_features` WHERE `id`= ?");
		$query->bindValue(1,$request_id);

			try {
			$query->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
		public function dlt_outbox($outboxId)
	{
		$query = $this->db->prepare("DELETE FROM `site_data` WHERE `id` = ? AND `status` = 'sent'");
		$query->bindValue(1,$outboxId);
				try{
			$query->execute();
		} catch(PDOException $e){

			die($e->getMessage());
		}
	}

	public function update_n_save_outbox($id,$user_id,$website_type,$status,$origin,$site_name,$due_date,$no_of_pages,$facebook,$twitter,$instagram)
	{

		$query = $this->db->prepare("UPDATE `site_data` SET `user_id` = ?, `website_type` = ?, `status` = ?, origin = ?, `site_name` = ?,`due_date` = ?,`no_of_pages` = ?, `facebook` = ?, `twitter` = ?, `instagram` = ? WHERE `id` = ? AND status = 'draft'");


		$query->bindValue(1,$user_id);
		$query->bindValue(2,$website_type);
		$query->bindValue(3,$status);
		$query->bindValue(4,$origin);
		$query->bindValue(5,$site_name);
		$query->bindValue(6,$due_date);
		$query->bindValue(7,$no_of_pages);
		$query->bindValue(8,$facebook);
		$query->bindValue(9,$twitter);
		$query->bindValue(10,$instagram);
		$query->bindValue(11,$id);


		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}

	public function add_features($user_id, $feature_id, $id, $status){
			$i=0;

			foreach($_POST['feature_id'] as $feature_id) {

		    	$query	= $this->db->prepare("INSERT INTO `selected_features`(`user_id`, `feature_id`, `id`, `status`) VALUES (?,?,?,?) ");
		        $query->bindValue(1, $user_id);        
		        $query->bindValue(2, $feature_id);
		        $query->bindValue(3, $id);
		        $query->bindValue(4, $status);
		      
		        $i++;

		    try {		        
		        $query->execute();
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}		
	}

	public function updateStatus($id)
	{
		$query = $this->db->prepare("UPDATE `site_data` SET `status` = 'sent' WHERE `id` = ?");
		$query->bindValue(1,$id);

			try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function list_selected_features(){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM selected_features t1 INNER JOIN site_data t2 ON t1.id=t2.id");

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
			public function delete_feature($id) {

		$query = $this->db->prepare("DELETE FROM `selected_features` WHERE `feature_id` = ? ");
		$query->bindValue(1, $id);
		
		try{
			
			$query->execute();

		} catch(PDOException $e){
			die($e->getMessage());
		}
		header('Location:edit_features.php?id='.$id);
	}
/*view selelected features*/
		public function view_features($id)
	{
		$query=$this->db->prepare("SELECT t1.id,t1.feature_id, t2.pages, t2.id, t3.id FROM selected_features t1 INNER JOIN features t2 ON t2.id = t1.feature_id INNER JOIN site_data t3 ON t3.id = t1.id WHERE t1.id = ?");
		$query->bindValue(1,$id);

			try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function viewInbox($site_id)
	{
		$query=$this->db->prepare("SELECT t1.designer_id, t1.quote_accepted, t1.quote_price,t1.finish_date,t1.quote_num,t1.basic_m_amt,t1.advanced_m_amt,t1.basic_m_period,t1.advanced_m_period, t2.id,t2.email,t2.contacts, t2.username, t3.id FROM designer t2 INNER JOIN designer_quote t1 ON t1.designer_id=t2.id INNER JOIN site_data t3 ON t3.id = t1.site_id
		 WHERE `site_id` = ? AND t1.quote_accepted = 'No'");
		$query->bindValue(1,$site_id);


			try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

/*List all features from features table*/
			public function list_features(){
		$query = $this->db->prepare("SELECT * FROM features ");
		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

		public function list_unselected($id)
		{
				
		$query	= $this->db->prepare("SELECT * FROM features WHERE id not IN (SELECT `feature_id` FROM selected_features WHERE id = ?)");

		$query->bindValue(1,$id);
		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function list_id($user_id){
		$query	= $this->db->prepare("SELECT `feature_id` FROM `selected_features` WHERE user_id =? ");
		$query->bindValue(1,$user_id);

		try {
			$query->execute();
			return $query->fetchAll();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	/*business profile*/
	public function upload_file(){

if(isset($_POST['btn-upload']))
{    
     
 $file = rand(9999,999999)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
 	$query= $this->db->prepare("INSERT INTO `business_profile`(`file`,`type`,`size`) VALUES (?,?,?)");
  ?>

  <script>
  alert('successfully uploaded');
        window.location.href='site_Data.php?success'; // note : this js
  </script>
  <?php
 }
//else
 {
  ?>
  <script>
  alert('error while uploading file');               // note : this js
        window.location.href='site_Data.php?fail';
        </script>


 <?php

	}	
 }
  $query->bindValue(1,$final_file);
		$query->bindValue(2,$file_type);
		$query->bindValue(3,$new_size);
		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
}

public function dlt_profile($outboxId)
{
	$query = $this->db->prepare("DELETE FROM `business_profile` WHERE `site_id` = ?");
	$query->bindValue(1,$outboxId);
	try {
			$query->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}

}


public function all_uploaded_files(){
		global $db;

		$query	= $this->db->prepare("SELECT  * FROM business_profile ");
        
		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}	

		/*Add status yes in designer_quote table column status1 when client accept quotation*/
	public function addStatus($dd,$site_id)
	{
		$quote_accepted = 'yes';
		$query = $this->db->prepare("UPDATE `designer_quote` SET `date_accepted` = ?, `quote_accepted` = ? WHERE `site_id` = ?");
		
		$query->bindValue(1,$dd);
		$query->bindValue(2,$quote_accepted);
		$query->bindValue(3,$site_id);

		if ($query) {
			$Qs = 'no';
			$query=$this->db->prepare("UPDATE designer_quote SET quote_accepted = ? WHERE `site_id` != ? AND quote_accepted != 'yes' ");
			$query->bindValue(1,$Qs);
			$query->bindValue(2,$site_id);

			try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	}	

		public function ViewAcceptedQoutes($user_id)
	{
		$query = $this->db->prepare("SELECT t1.id, t1.designer_id,t1.site_id,t1.quote_price,t1.finish_date,t1.date_accepted,t1.basic_m_amt, t1.advanced_m_amt,t1.basic_m_period,t1.advanced_m_period, t2.id, t2.user_id,t3.id, t3.username FROM designer_quote t1 INNER JOIN site_data t2 ON t2.id = t1.site_id INNER JOIN designer t3 ON t3.id = t1.designer_id WHERE t2.user_id = ?");
		
		$query->bindValue(1,$user_id);
		
		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}

	/*update date accepted the quotation in designer quote table*/
	public function updateDDAccepted($site_id,$dd,$code_Status, $q_id)
	{
		
		$query=$this->db->prepare("UPDATE designer_quote SET date_accepted = ?, quote_accepted = ? WHERE site_id = ?");

		$query->bindValue(1,$dd);
		$query->bindValue(2,$code_Status);
		$query->bindValue(3,$site_id);		
		
		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
		header('location:Payment_type_page.php?site_id='.$site_id);
}
	


	/**/

	/*public function dltQoute($quoteId)
	{
		$query=$this->db->prepare("DELETE FROM designer_quote WHERE site_id = ?");
		$query->bindValue(1,$quoteId);

			try{

			$query->execute();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}*/


}
?>

		