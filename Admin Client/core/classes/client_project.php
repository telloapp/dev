
<?php
class client_project{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}


	public function view_completedsite($id){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM `site_data` WHERE `user_id` = ? AND `statustwo` = 'Done' AND `statusthree` != 'cancelled' ");

		$query->bindValue(1,$id);

		try {
			$query->execute();

			return $query->fetchAll();

		} catch (PDOException $e) { 
			die($e->getMessage());
		}
	}

	public function view_inprogress($id){
		global $db;

		$query	= $this->db->prepare("SELECT * FROM `site_data` WHERE `user_id`=? AND  statustwo = 'Not Done'");
             
             $query->bindValue(1,$id);
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


	 public function insert_in_to_revision($user_id,$site_id, $status, $revision_data,$start_date,$end_date,$revision_num) {
	 	$start_date= date('Y-m-d');
$end_date=  date('Y-m-d', strtotime(' + 3 days'));
$revision_num= 'Complete';
	 	
		$query=$this->db->prepare("INSERT INTO revision (client_id, site_id, status, revision_data, start_date, end_date,revision_num) VALUES (?,?,?,?,?,?,?)");
		$paydate	= time();
	
		$query->bindValue(1,$user_id);
		$query->bindValue(2,$site_id);
		$query->bindValue(3,$status);
		$query->bindValue(4,$revision_data);
		$query->bindValue(5,$start_date);
		$query->bindValue(6,$end_date);
		$query->bindValue(7,$revision_num);
		
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
		$query = $this->db->prepare("SELECT * FROM add_feature T1 INNER JOIN selected_features T2 ON T1.id= T2.feature_id WHERE T2.id = ?");
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

	public function update_statushtree($status3,$cancell_date,$id){

		$query	= $this->db->prepare("UPDATE `site_data` SET 

									   `statusthree`	= ?,
									   `cancell_date`	= ?

									   WHERE `id`	= ? 
									   ");

		$query->bindValue(1, $status3);
		$query->bindValue(2, $cancell_date);
		$query->bindValue(3, $id);
	
		

		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


 public function insert_in_to_status($statusthree) {
	 
	 	
		$query=$this->db->prepare("INSERT INTO site_data (statusthree) VALUES (?)");
		
	
		$query->bindValue(1,$statusthree);
		
		
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

public function list_cancelled_site($id)
	{
		$query = $this->db->prepare("SELECT * FROM site_data  WHERE user_id =? AND statusthree = 'Cancelled' ");
        
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


	public function update_statustwo($statustwo,$aprove_date,$id){

		$query	= $this->db->prepare("UPDATE `site_data` SET 

									   `statustwo`	= ?,
									   `aprove_date`	= ?

									   WHERE `id`	= ? 
									   ");

		$query->bindValue(1, $statustwo);
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
		$query = $this->db->prepare("SELECT * FROM site_data  WHERE statustwo = 'Approved' AND user_id =?");
        
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


	public function update_revisions($statustwo,$id){

		$query	= $this->db->prepare("UPDATE `site_data` SET 

									   `statustwo`	= ?

									   WHERE `id`	= ? 
									   ");

		$query->bindValue(1, $statustwo);
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

	public function view_coplaints_details($id)
	{
		$query = $this->db->prepare("SELECT * FROM client_complaints WHERE id = ?");
        
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


}