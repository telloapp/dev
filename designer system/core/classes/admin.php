<?php

class admin{

	private $db;

	public function __construct($database){
		$this->db = $database;
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