<?php 
class projects{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	



	public function new_projects($user_id) 
	{
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE designer_id = ? AND status = 'New' ");
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
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE designer_id = ? AND status = 'Inprogress' ");
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
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE designer_id = ? AND status = 'Completed' ");
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
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE designer_id = ? AND status = 'Cancelled' ");
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
		$query = $this->db->prepare("SELECT * FROM `site_data` WHERE designer_id = ? AND status = 'Approved' ");
		$query->bindValue(1,$user_id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}
	public function new_project_done($id) {


		$query = $this->db->prepare("UPDATE `site_data` SET `status` = 'Inprogress' WHERE `id` = ?");

		$query->bindValue(1, $id);

		try{
			$query->execute();
			return true;
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}



	public function inprogress_project_done($id) {


		$query = $this->db->prepare("UPDATE `site_data` SET `status` = 'Completed' WHERE `id` = ?");

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
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN  users T2 ON T1.designer_id = T2.id WHERE T1.id =?");
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
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN  users T2 ON T1.designer_id = T2.id WHERE T1.id =?");
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
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN  users T2 ON T1.designer_id = T2.id WHERE T1.id =?");
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
		$query = $this->db->prepare("SELECT * FROM site_data T1 INNER JOIN  users T2 ON T1.designer_id = T2.id WHERE T1.id =?");
		$query->bindValue(1,$id);


		try{

			$query->execute();

			return $query->fetchAll();

		} catch(PDOException $e){

			die($e->getMessage());
		}
	}

	}

?>