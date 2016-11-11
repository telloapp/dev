<?php 
class chartforum{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}

	public function insert_data($desiger_id,$category,$message)
	{

	  $query = $this->db->prepare("INSERT INTO `chat_forum`(`message`,`category`) VALUES (?,?) WHERE `designer_id` = ?");


	   $query->bindValue(1, $message);
	   $query->bindValue(2, $category);
	   $query->bindValue(3, $desiger_id);
	 
	}

	public function list_messages()
	{
      $query = $this->db->prepare("SELECT T1.id, T1.designer_id, T1.message, T1.category FROM chat_forum T1 INNER JOIN designer T2 ON T1.designer_id = T2.id");


			try
			{
				$query->execute();

				return $query->fetchAll();

				
			} catch(PDOException $e)

			{
				die($e->getMessage());
			}

	}
}

?>