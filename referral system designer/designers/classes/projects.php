<?php 
class projects{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	



	public function new_projects($user_id) 
	{
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN designer_quote T2 ON T1.id=T2.site_id WHERE T1.designer_id = ? AND T2.quote_accepted = 'Yes' AND T1.seen !='Yes'");
		$query->bindValue(1,$user_id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}


public function inprogress_project($user_id) 
	{
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN designer_quote T2 ON T1.id=T2.site_id WHERE T1.designer_id = ? AND T1.progress_status = 'Inprogress' AND T2.quote_accepted = 'Yes' ");
		$query->bindValue(1,$user_id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}

public function complete_project($user_id) 
	{
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN designer_quote T2 ON T1.id=T2.site_id WHERE T1.designer_id = ? AND T1.cancel_status = 'Not cancelled' AND T2.quote_accepted = 'Yes'  ");
		$query->bindValue(1,$user_id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}

public function Cancelled_project($user_id) 
	{
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN designer_quote T2 ON T1.id=T2.site_id WHERE T1.designer_id = ? AND T1.cancel_status = 'Cancelled' AND T2.quote_accepted = 'Yes' ");
		$query->bindValue(1,$user_id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}

public function approved_project($user_id) 
	{
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN designer_quote T2 ON T1.id=T2.site_id WHERE T1.designer_id = ? AND T1.progress_status = 'Approved' AND T2.quote_accepted = 'Yes' ");
		$query->bindValue(1,$user_id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}
	public function new_project_done($id) {


		$query = $this->db->prepare("UPDATE `site_data` SET `progress_status` = 'Inprogress', `seen` ='Yes' WHERE `id` = ?");

		$query->bindValue(1, $id);

		try{
			$query->execute();
			return true;
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}



	public function inprogress_project_done($id) {


		$query = $this->db->prepare("UPDATE `site_data` SET `cancel_status` = 'Not cancelled', `progress_status` = 'Completed' WHERE `id` = ?");

		$query->bindValue(1, $id);

		try{
			$query->execute();
			return true;
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}


public function client_complains($user_id) 
	{
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN  client_complaints T2 ON T1.id = T2.site_id WHERE T2.designer_id =?");
		$query->bindValue(1,$user_id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}



public function completed_projects_details($id) 
	{
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN designer T2 ON T1.designer_id = T2.id INNER JOIN designer_quote T3 ON T1.id=T3.site_id INNER JOIN client_payment T4 ON T4.d_q_id = T1.designer_id WHERE T1.id =? AND T3.quote_accepted = 'Yes'");
		$query->bindValue(1,$id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}


public function inprogres_projects_details($id) 
	{
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN  designer T2 ON T1.designer_id = T2.id INNER JOIN designer_quote T3 ON T1.id=T3.site_id INNER JOIN client_payment T4 ON T4.site_id = T1.id  WHERE T1.id =? AND T3.quote_accepted = 'Yes' GROUP BY T1.id");
		$query->bindValue(1,$id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}
public function cancelled_projects_details($id) 
	{
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN  designer T2 ON T1.designer_id = T2.id INNER JOIN designer_quote T3 ON T1.id=T3.site_id INNER JOIN client_payment T4 ON T4.d_q_id = T1.designer_id WHERE T1.id =? AND T3.quote_accepted = 'Yes'");
		$query->bindValue(1,$id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}
public function approved_projects_details($id) 
	{
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN  designer T2 ON T1.designer_id = T2.id INNER JOIN designer_quote T3 ON T1.id=T3.site_id INNER JOIN client_payment T4 ON T4.d_q_id = T1.designer_id WHERE T1.id =? AND T3.quote_accepted = 'Yes'");
		$query->bindValue(1,$id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}


public function project_progress($id) 

	{
		$query = $this->db->prepare("SELECT SUM(value) AS tot_amount FROM selected_features WHERE id= ? AND c_status = 'Done' ");
		$query->bindValue(1,$id);

		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}
public function get_features($id) 

	{
		$query = $this->db->prepare("SELECT * FROM selected_features T1 INNER JOIN features T2 ON T1.feature_id = T2.id WHERE T1.id = ?  ");
		$query->bindValue(1,$id);

		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}

	public function get_site_data($id) 

	{


$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN  designer T2 ON T1.designer_id = T2.id INNER JOIN designer_quote T3 ON T1.id=T3.site_id INNER JOIN client_payment T4 ON T4.d_q_id = T1.designer_id  WHERE T1.id =?");
		
		$query->bindValue(1,$id);

		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}


public function checklist_done($id,$check_id) {

		$c_status= "Done";
	    $value= "20";


		$query = $this->db->prepare("UPDATE selected_features SET c_status = ?, value = ? WHERE id = ? AND feature_id = ?");
		
		$query->bindValue(1, $c_status);
        $query->bindValue(2, $value);
        $query->bindValue(3, $id);
        $query->bindValue(4, $check_id);




		try{
			$query->execute();

			return true;



		} catch(PDOException $e){
			die($e->getMessage());
		}

	}



public function get_checklist_done($id) 

	{
		$query = $this->db->prepare("SELECT * FROM selected_features WHERE id =? ");
		$query->bindValue(1,$id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}


public function revision_projects($user_id) 

	{
		$query = $this->db->prepare("SELECT * FROM revision T1 INNER JOIN site_data T2 ON T1.site_id =T2.id WHERE T1.designer_id= ? AND T1.designer_id =T2.designer_id AND T1.status='Not Done'");
		$query->bindValue(1,$user_id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}


public function revision_projects_details($id) 

	{
		$query = $this->db->prepare("SELECT * FROM revision T1 INNER JOIN site_data T2 ON T1.site_id =T2.id WHERE T1.site_id= ? AND T1.designer_id =T2.designer_id" );
		$query->bindValue(1,$id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}

public function revision_done($id,$site_link) {


		$query = $this->db->prepare("UPDATE revision SET status = 'Done', site_link = ? WHERE id = ?");
		
		$query->bindValue(1, $site_link);
        $query->bindValue(2, $id);


		try{
			$query->execute();
			return true;
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}



public function complete_enabled($id) 

	{
		$query = $this->db->prepare("SELECT * FROM selected_features T1 INNER JOIN site_data T2 ON T2.id =T1.id WHERE T1.id = ? AND c_status='Done'");
		$query->bindValue(1,$id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}




public function checklist_completed($id,$date) {

		$query = $this->db->prepare("UPDATE site_data SET site_date_completed = ? WHERE id = ? ");
		
		$query->bindValue(1, $date);
        $query->bindValue(2, $id);

		try{
			$query->execute();

			return true;

		} catch(PDOException $e){
			die($e->getMessage());
		}

}


public function completed_revision_projects($user_id) 

	{
		$query = $this->db->prepare("SELECT * FROM revision T1 INNER JOIN site_data T2 ON T1.site_id =T2.id WHERE T1.designer_id= ? AND T1.designer_id =T2.designer_id AND T1.status='Done'");
		$query->bindValue(1,$user_id);

		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}


	}

?>

