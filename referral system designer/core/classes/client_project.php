
<?php
class client_project{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}


	public function view_completedsite($user_id){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM site_data t1 INNER JOIN designer_quote t2 ON t1.id=t2.site_id where (progress_status = 'Completed' AND cancel_status = 'Not cancelled') AND user_id=?");

		$query->bindValue(1,$user_id);

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function view_inprogress(){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM `site_data` where progress_status  = 'Inprogress' AND cancel_status != 'cancelled' AND `request_report` != 'draft'");

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}



	public function view_client_siteinfo(){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM `features`");

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage()); 
		}
	}


	 public function insert_in_to_revision($user_id,$site_id, $status, $revision_data,$start_date,$end_date,$revision_num,$designe_id) {
	 	$start_date= date('Y-m-d');
$end_date=  date('Y-m-d', strtotime(' + 3 days'));
$revision_num= 'Complete';
	 	
		$query=$this->db->prepare("INSERT INTO revision (client_id, site_id, status, revision_data, start_date, end_date,revision_num,designer_id) VALUES (?,?,?,?,?,?,?,?)");
		$paydate	= time();
	
		$query->bindValue(1,$user_id);
		$query->bindValue(2,$site_id);
		$query->bindValue(3,$status);
		$query->bindValue(4,$revision_data);
		$query->bindValue(5,$start_date);
		$query->bindValue(6,$end_date);
		$query->bindValue(7,$revision_num);
		$query->bindValue(8,$designe_id);
		
		try{
			
			$query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}
		header('Location:all_user_revisions.php?site_id='.$site_id);


	}


	public function view_project_tb($id){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM revision T1 INNER JOIN site_data T2 ON T1.site_id = T2.id  WHERE `user_id`= ? ");

		$query->bindValue(1, $id);
		
		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function feature_category($id){
		$query = $this->db->prepare("SELECT * FROM features T1 INNER JOIN selected_features T2 ON T1.id= T2.feature_id WHERE T2.id = ?");
        $query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	

	public function list_of_revision($id){
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN revision T2 ON T1.id= T2.site_id WHERE T2.status = 'Not Done' AND T2.site_id = ?");
        $query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	

	public function list_of_completedrevisions($id){
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN revision T2 ON T1.id= T2.site_id WHERE T2.status = 'Done' AND T2.site_id= ? ");
          $query->bindValue(1, $id);

		try{
			$query->execute();
			return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	

public function count_revisions($id,$site_id)
	{
		$query = $this->db->prepare("SELECT * FROM revision WHERE site_id = ?  AND client_id = ? ");
        
       $query -> bindValue(1,$site_id);
       $query -> bindValue(2,$id);
		try
		{
			$query->execute();
			return $query->fetchAll();		

		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}
	 public function insert_in_to_complaint($user_id,$site_id, $complaint) {
	 
	 	
		$query=$this->db->prepare("INSERT INTO client_complaints (client_id, site_id, complaint) VALUES (?,?,?)");
		$paydate	= time();
	
		$query->bindValue(1,$user_id);
		$query->bindValue(2,$site_id);
		$query->bindValue(3,$complaint);
		//$query->bindValue(4,$design_id);
		
		
		try{
			
			$query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}

	public function update_cancel_status($cancel_status,$cancell_date,$id){

		$query	= $this->db->prepare("UPDATE `site_data` SET 

									   `cancel_status`	= ?,
									   `cancell_date`	= ?

									   WHERE `id`	= ? 
									   ");

		$query->bindValue(1, $cancel_status);
		$query->bindValue(2, $cancell_date);
		$query->bindValue(3, $id);
	
		

		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


 public function insert_in_to_status($cancel_status) {
	 
	 	
		$query=$this->db->prepare("INSERT INTO site_data (cancel_status) VALUES (?)");
		
	
		$query->bindValue(1,$cancel_status);
		
		
		try{
			
			$query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}


	public function view_revision_details($id)
	{
		$query = $this->db->prepare("SELECT * FROM revision WHERE id = ?");
        
       $query -> bindValue(1,$id);
		try
		{
			$query->execute();
			return $query->fetchAll();		

		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}

	public function list_revisions_site($id)
	{
		$query = $this->db->prepare("SELECT T1.site_name FROM site_data T1 INNER JOIN revision T2 ON T1.id = T2.site_id WHERE T1.user_id=?  ");
        
       $query -> bindValue(1,$id);
		try
		{
			$query->execute();
			return $query->fetchAll();		

		}
		catch(PDOException $e)
		{
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


public function list_cancelled_site($id)
	{
		$query = $this->db->prepare("SELECT * FROM site_data  WHERE cancel_status = 'cancelled' AND user_id =?");
        
       $query -> bindValue(1,$id);
		try
		{
			$query->execute();
			return $query->fetchAll();		

		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}


	public function update_progress_status($progress_status,$aprove_date,$id){

		$query	= $this->db->prepare("UPDATE `site_data` SET 

									   `progress_status`	= ?,
									   `aprove_date`	= ?

									   WHERE `id`	= ? 
									   ");

		$query->bindValue(1, $progress_status);
		$query->bindValue(2, $aprove_date);
		$query->bindValue(3, $id);
	
		

		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function list_aproved_site($id)
	{
		$query = $this->db->prepare("SELECT * FROM site_data  WHERE progress_status  = 'Approved' AND user_id =?");
        
       $query -> bindValue(1,$id);
		try
		{
			$query->execute();
			return $query->fetchAll();		

		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}


	public function update_revisions($progress_status,$id){

		$query	= $this->db->prepare("UPDATE `site_data` SET 

									   `progress_status`	= ?

									   WHERE `id`	= ? 
									   ");

		$query->bindValue(1, $progress_status);
		$query->bindValue(2, $id);
	
		

		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function list_all_revisions($site_id)
	{
		$query = $this->db->prepare("SELECT DISTINCT T1.site_name,T1.id FROM site_data T1 INNER JOIN revision T2 ON T1.id = T2.site_id WHERE T1.user_id=?  ");
        
       $query -> bindValue(1,$site_id);
		try
		{
			$query->execute();
			return $query->fetchAll();		

		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}


public function list_new_revisions($id){
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN revision T2 ON T1.id= T2.site_id WHERE  T2.site_id= ? ");
          $query->bindValue(1, $id);

		try{
			$query->execute();
			return $query->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}


	public function update_revision2($revision_num,$id){

		$query	= $this->db->prepare("UPDATE `revision` SET 

									   `revision_num`	= ?

									   WHERE `id`	= ? 
									   ");

		$query->bindValue(1, $revision_num);
		$query->bindValue(2, $id);
	
		

		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}