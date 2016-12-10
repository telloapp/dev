<?php

class Admin{

	private $db;

	public function __construct($database){
		$this->db = $database;
	}

	/*============== add new admin========================*/

	public function register( $email, $password){

		global $bcrypt; // making the $bcrypt variable global so we can use here
		

		$query 	= $this->db->prepare("INSERT INTO admin (email, password, contact) VALUES (?, ?, ?)");
		$query->bindValue(1,$email);
		$query->bindValue(2,$password);
		$query->bindValue(2,$contact);

		try{
			$query->execute();

		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	 

		public function admin_exists($username) {
	
		$query = $this->db->prepare("SELECT COUNT(id) FROM admin WHERE email = ?");
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

	public function email_exists($email) 
	{

		$query = $this->db->prepare("SELECT COUNT(id) FROM admin WHERE email = ?");
		$query->bindValue(1,$email);
	
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

	public function super_admin_login($email,$password,$super_admin_id) {

		global $bcrypt;  // Again make get the bcrypt variable, which is defined in init.php, which is included in login.php where this function is called

		$query = $this->db->prepare("SELECT password, id FROM admin WHERE email = ? AND id = ?");
		$query->bindValue(1,$email);
		$query->bindValue(2,$super_admin_id);

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

	public function other_admin_login($email, $password) {

		global $bcrypt;  // Again make get the bcrypt variable, which is defined in init.php, which is included in login.php where this function is called

		$query = $this->db->prepare("SELECT password, id FROM admin WHERE email = ?");
		$query->bindValue(1, $email);

		try{
			
			$query->execute();
			$data 				= $query->fetch();
			$stored_password 	= $data['password']; // stored password
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


	public function userdata($id) {

		$query = $this->db->prepare("SELECT * FROM admin WHERE id= ?");
		$query->bindValue(1, $id);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}

	public function delete_admin($admin_id)
	{

		$query = $this->db->prepare("DELETE FROM admin WHERE id = ?");
		$query->bindValue(1,$admin_id);
		try{
			
			$query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}

	public function Disp_admin($main_admin_id)
     {

       	global $db;

	$query = $this->db->prepare("SELECT * FROM admin WHERE id != ?");
	$query->bindValue(1,$main_admin_id);

			try{

				$query->execute();
				return $query->fetchAll();
				
			} catch(PDOException $e){

				die($e->getMessage());
			}

		}

		public function select_admin($admin_id){

		global $db;

		$query	= $this->db->prepare("SELECT email, ad_password FROM admin  WHERE id = ?");

			$query->bindValue(1,$admin_id);



		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function update_admin($id,$email,$username,$password)
	{
		global $bcrypt;
		$admin_password = $bcrypt->genHash($password);

		$query	= $this->db->prepare("UPDATE admin SET
									  email			= ?,
									  password  	= ?,							   									
									  contact   	= ?,							   									
									  WHERE  id 	= ? 
									   ");
	
	    $query->bindValue(1, $email);
		$query->bindValue(2, $username);
		$query->bindValue(3, $password);
		$query->bindValue(4, $id);
		
		


		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

/*=========delete all message details=======*/
	 public function delete_messages($m_id) {

		$query = $this->db->prepare("DELETE FROM chat_forum WHERE id = ?");
	
		$query->bindValue(1,$m_id);
		
		try{
			
			$query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}

	/*=========delete all comments of the deleted message=======*/
	 public function delete_comments($m_id) {

		$query = $this->db->prepare("DELETE FROM comments WHERE m_id = ?");
	
		$query->bindValue(1,$m_id);
		
		try{
			
			$query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}

	

	/*================delete one comment =================================*/
	 public function delete_comment($id) {

		$query = $this->db->prepare("DELETE FROM comments WHERE id = ?");
	
		$query->bindValue(1,$id);
		
		try{
			
			$query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}


	/*=========================Display All Quote Request==============*/
	public function list_quote_request()
	{
     
     $query = $this->db->prepare("SELECT * FROM site_data WHERE status = 'send'");

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}

	}

/*=======================Display All Updated Quote Request=========*/
   public function list_all_updated_quote()
   {

    $query = $this->db->prepare("SELECT * FROM `site_data` WHERE status = 'saved'");

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}

   }
/*======================Display All Sent Quotes====================*/
  public function list_all_sent_quote($id)
  {
    $query = $this->db->prepare("SELECT * FROM designer_quote WHERE id = ?");

      $query->bindValue(1,$id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}

  }
/*===================Display All Saved Quotes=====================*/
  public function list_all_saved_quote($id)
  {
   $query = $this->db->prepare("SELECT * FROM designer_quote WHERE id = ?");

      $query->bindValue(1,$id);

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}

  }
/*====================Display All Designer==================*/
  public function list_all_designer()
  {
  $query = $this->db->prepare("SELECT * FROM `Designer` ");

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}	
  }

  public function view_sent_quote($id)
{
$query = $this->db->prepare("SELECT * FROM `designer_quote` WHERE  id = ? ");

$query->bindValue(1, $id);


   try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}

public function list_infor_quote($id)
{

$query = $this->db->prepare("SELECT * FROM designer_quote t1 INNER JOIN site_data t2 ON t1.site_id = t2.id  WHERE t1.id=?");

  
  $query->bindValue(1,$id);

   try{
			$query->execute();	
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}


/*=======================View Sent quote=====================*/

public function display_quote_details($id)
{

$query = $this->db->prepare("SELECT * FROM designer t1 INNER JOIN designer_quote t2 ON t1.id = t2.designer_id  WHERE t1.id = ? AND t2.status = 'send'");

  
  $query->bindValue(1,$id);

   try{
			$query->execute();	
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}

/*=========================View Saved quote=================*/
public function display_saved_quote_details($id)
{

$query = $this->db->prepare("SELECT * FROM designer t1 INNER JOIN designer_quote t2 ON t1.id = t2.designer_id  WHERE t1.id = ? AND t2.status = 'draft'");

  
  $query->bindValue(1,$id);

   try{
			$query->execute();	
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}
/*=======================View Rejected Quote================*/

public function display_rejected_quote_details($id)
{

$query = $this->db->prepare("SELECT * FROM designer t1 INNER JOIN designer_quote t2 ON t1.id = t2.designer_id  WHERE t1.id = ? AND t2.quote_accepted = 'No'");

  
  $query->bindValue(1,$id);

   try{
			$query->execute();	
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}
public function list_updated_quote_request()
	{
     
     $query = $this->db->prepare("SELECT * FROM site_data WHERE status = 'saved'");

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}

	}

public function list_all_rejected_quote($id)
  {
  $query = $this->db->prepare("SELECT * FROM `designer_quote` WHERE id = ? ");
      $query->bindValue(1,$id);
        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}	
  }

}