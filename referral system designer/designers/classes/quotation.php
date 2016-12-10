<?php 
class quotation
{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}

/*======Listing all quote request=======*/

public function list_allquote_request()
{

$query = $this->db->prepare("SELECT * FROM site_data WHERE request_report = 'sent'");

   try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}

public function list_RequestFeatures($id)
{
$query = $this->db->prepare("SELECT * FROM site_data WHERE id = ?");
$query->bindValue(1,$id);
//$query = $this->db->prepare("SELECT * FROM site_data  WHERE status = 'send'");
   try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}



public function view_quote_request($id)
{

$query = $this->db->prepare("SELECT * FROM features t1 INNER JOIN selected_features t2 ON t1.id = t2.feature_id INNER JOIN site_data t3 ON t2.id = t3.id WHERE T3.id=?");

  
  $query->bindValue(1,$id);

   try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}

	



/*======Listing all updated quote request=======*/

public function list_allupdated_quote_request()
{
 $query = $this->db->prepare("SELECT * FROM `site_data` WHERE request_report = 'saved'");

   try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}

/*========Listing all sent quote===========*/

public function list_all_sentquote($designer_id)
{
$query = $this->db->prepare("SELECT * FROM `designer_quote` WHERE request_report = 'sent' AND designe_id = ? ORDER BY q_id DESC");

$query->bindValue(1, $designer_id);


   try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}

/*=========List All Saved quote======*/

public function list_all_draft_quote($designer_id)
{
$query = $this->db->prepare("SELECT * FROM `designer_quote` WHERE request_report = 'draft' AND designe_id = ? ORDER BY q_id DESC ");

$query->bindValue(1, $designer_id);


   try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}

public function delete_quote($id) {

		$query = $this->db->prepare("DELETE FROM designer_quote WHERE q_id = ?");
	
		$query->bindValue(1,$id);
		
		try{
			
			$query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}		

/*==========View Quote Request======*/


public function create_quote($designer_id, $site_id, $quote_price, $finish_date, $own_maintenance, $basic_m_amt,$advanced_m_amt, $basic_m_period,$advanced_m_period, $status, $quote_accepted)
{

$quote_num = rand(100,1000);
$query=$this->db->prepare("INSERT INTO designer_quote (designe_id, site_id, quote_price, finish_date, quote_num, own_maintenance, basic_m_amt, advanced_m_amt,basic_m_period,advanced_m_period, request_report, quote_accepted) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");



		$query->bindValue(1, $designer_id);
		$query->bindValue(2, $site_id);
		$query->bindValue(3, $quote_price); 
		$query->bindValue(4, $finish_date);
		$query->bindValue(5, $quote_num);
		$query->bindValue(6, $own_maintenance);
		$query->bindValue(7, $basic_m_amt);
		$query->bindValue(8, $advanced_m_amt);
		$query->bindValue(9, $basic_m_period);
		$query->bindValue(10, $advanced_m_period);
		$query->bindValue(11, $status);
		$query->bindValue(12, $quote_accepted);


		try
		{
         $query->execute();
         
		}
		catch(PDOException $e)
		{
			die($e->getMessage()); 
		}
}

	public function update_send_quote($designer_id,  $quote_price, $finish_date, $own_maintenance, $basic_m_amt,$advanced_m_amt, $basic_m_period,$advanced_m_period, $status, $quote_accepted)
	{
      

		$query = $this->db->prepare("UPDATE designer_quote SET designe_id = ?, 
			                                                   quote_price = ? , 
			                                                   finish_date = ?,
			                                                   own_maintenance = ?,
			                                                   basic_m_amt = ?,
			                                                   advanced_m_amt = ?,
			                                                   basic_m_period = ?, 
			                                                   advanced_m_period = ?, 
			                                                   quote_accepted = ? 

			                                                   WHERE  request_report = 'draft'");

		$query->bindValue(1, $designer_id);
		$query->bindValue(2, $quote_price); 
		$query->bindValue(3, $finish_date);
		$query->bindValue(4, $own_maintenance);
		$query->bindValue(5, $basic_m_amt);
		$query->bindValue(6, $advanced_m_amt);
		$query->bindValue(7, $basic_m_period);
		$query->bindValue(8, $advanced_m_period);		
		$query->bindValue(9, $quote_accepted);
		//$query->bindValue(10, $status);
	
			try
	    {
		$query->execute();
		
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	
	}


public function view_quote_details($id)
{
$query = $this->db->prepare("SELECT * FROM `designer_quote` WHERE  q_id = ? ");

$query->bindValue(1, $id);


   try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}

public function list_all_rejected_quote($designer_id)
{
$query = $this->db->prepare("SELECT * FROM `designer_quote` WHERE quote_accepted = 'No' AND designe_id = ? ");

$query->bindValue(1, $designer_id);


   try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}

public function delete_rejected_quote($id) {

		$query = $this->db->prepare("DELETE FROM designer_quote WHERE q_id = ?");
	
		$query->bindValue(1,$id);
		
		try{
			
			$query->execute();
		} catch(PDOException $e){
			die($e->getMessage());
		}

	}

	/*================Site data for quotation=================*/

		public function list_infor_quote($id)
{

$query = $this->db->prepare("SELECT * FROM designer_quote t1 INNER JOIN site_data t2 ON t1.site_id = t2.id  WHERE t1.q_id=?");

  
  $query->bindValue(1,$id);

   try{
			$query->execute();	
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}
}
	

/*============================Admin Section==============*/

public function list_quote_request()
	{
     
     $query = $this->db->prepare("SELECT * FROM site_data WHERE request_report = 'sent'");

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}

	}

/*====================List updated quote===================*/

public function list_updated_quote_request()
	{
     
     $query = $this->db->prepare("SELECT * FROM site_data WHERE request_report = 'sent'");

        try{
			$query->execute();
			return $query->fetchAll();
		}
		catch(PDOException $e){
			die($e->getMessage()); 
		}

	}

}
?>