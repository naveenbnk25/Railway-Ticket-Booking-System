<?php 

include_once('Connection.php'); 

class Database extends Connection{


	public function __construct(){

		parent::__construct();
	}
	public function getRow($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetch();	
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());	
		}


	}

	
	public function getRows($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll();	
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());	
		}
	}//end getRows

	//insert row
	public function insertRow($query, $params = []){
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return TRUE;	
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());	
		}

	}//end insertRow

	//update row
	public function updateRow($query, $params = []){
		$this->insertRow($query, $params);
		return true;
	}//end updateRow

	//delete row
	public function deleteRow($query, $params = []){
		$this->insertRow($query, $params);
		return true;
	}//end deleteRow

	//get the last inserted ID
	public function lastID(){
		$lastID = $this->datab->lastInsertId(); 
		return $lastID;
	}//end lastID func


	
	public function transInsert($query, $params = [], $query2, $params2 = []){
		try {
			$this->transaction->beginTransaction();
				$stmt = $this->datab->prepare($query);
				$stmt->execute($params);

				$stmt2 = $this->datab->prepare($query2);
				$stmt2->execute($params2);

			$this->transaction->commit();
		} catch (PDOException $e) {
			$this->transaction->rollBack();
			throw new Exception($e->getMessage());	
		}
	}//end transac func


	public function Begin(){
		$this->transaction->beginTransaction();
	}

	public function Commit(){
		$this->transaction->commit();
	}

	public function test()
	{
		echo 'database class test';
	}
}


 ?>