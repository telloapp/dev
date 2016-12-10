<?php 
class client_payment{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	
	//===========insert into client payment ===========

	public function client_pay($user_id,$payment_method,$payment_type,$client_status,$site_id,$d_q_id)	
{
	$date=date('Y-m-d');
	
$query= $this->db->prepare("INSERT INTO `client_payment`(`user_id`,`payment_method`,`payment_type`,`client_status`, `d_q_id`, `site_id`,`date`) VALUES (?,?,?,?,?,?,?)");

		
		$query->bindValue(1,$user_id);
		$query->bindValue(2,$payment_method);
		$query->bindValue(3,$payment_type);
		$query->bindValue(4,$client_status);
		$query->bindValue(5,$d_q_id);
		$query->bindValue(6,$site_id);
		$query->bindValue(7,$date);
		
		
		try {
			$query->execute();
			$id = $this->db->lastinsertId();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
		if ($payment_method == "EFT payment")
			{
				header('Location:sage_pay_page.php?c_id='.$id);
			}
		elseif($payment_method == "Direct Payment")
		{
			header('Location:direct_tello_payment.php?c_id='.$id);
		}
		elseif($payment_method == "Credit Payment")
		{
			header('Location:sage_pay_page.php?c_id='.$id);
		}
	}

		public function insert_id($id)

{
	
$query= $this->db->prepare("INSERT INTO `tbl_uploads`(`c_id`) VALUES (?)");

		
		$query->bindValue(1,$id);
		
		
		try {
			$query->execute();
			

		} catch (PDOException $e) {
			die($e->getMessage());
		}
		
	}

	//===========view client report ===========

	public function all_client_report($user_id){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM client_payment t1 INNER JOIN users t2 ON  t1.user_id = t2.id INNER JOIN tbl_uploads t3 ON t3.c_id = t1.c_id WHERE t2.id = ?");
		$query->bindValue(1,$user_id);

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}	

public function client_up(){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM tbl_uploads ");
		

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}	


//===========upload images ===========
public function upload_file($user_id,$c_id){
		global $db;

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
 	$query= $this->db->prepare("UPDATE  `tbl_uploads` SET `file`=?, `type`=?, `size`=?, `user_id`=?  WHERE `c_id` = ?");
  ?>

  <script>
  alert('successfully uploaded');
        window.location.href='billing_note.php?success'; // note : this js
  </script>
  <?php
 }
//else
 {
  ?>
  <script>
  alert('error while uploading file');               // note : this js
        window.location.href='billing_note.php?fail';
        </script>


 <?php


	}	
 }
  $query->bindValue(1,$final_file);
		$query->bindValue(2,$file_type);
		$query->bindValue(3,$new_size);
		$query->bindValue(4,$user_id);
		$query->bindValue(5,$c_id);
		

		try {
			$query->execute();
			

		} catch (PDOException $e) {
			die($e->getMessage());
		}

}

//===========select all images ===========
public function all_uploaded_files($user_id,$c_id){
		global $db;

		$query	= $this->db->prepare("SELECT  * FROM tbl_uploads WHERE user_id=? AND c_id = ?");
        $query->bindValue(1,$user_id);
        $query->bindValue(2,$c_id);
		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function all_pending($user_id){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM client_payment t1 INNER JOIN users t2 ON t1.user_id=t2.id INNER JOIN tbl_uploads t3 ON t3.c_id = t1.c_id WHERE t1.user_id = ?  AND t1.client_status = 'Pending'  ");
		$query->bindValue(1,$user_id);
	

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
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


	public function all_complated($user_id){
		global $db;



		$query	= $this->db->prepare("SELECT * FROM client_payment t1 INNER JOIN users t2 ON t1.user_id=t2.id INNER JOIN tbl_uploads t3 ON t3.c_id = t1.c_id WHERE t1.user_id = ?  AND t1.client_status = 'Completed' ");
		$query->bindValue(1,$user_id);
	

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}			
	
}


?>