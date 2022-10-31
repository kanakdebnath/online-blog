<?php 

class Database {

	public $host = 'localhost';
	public $user = 'root';
	public $pass = '';
	public $database = 'online_php_class';

	public $connection;
	public $error;


	public function __construct()
	{
		$this->ConnectDB();
	}


	private function ConnectDB(){
		$this->connection  = new mysqli($this->host, $this->user, $this->pass, $this->database );
		if (!$this->connection) {
			$this->error = "Connection Fail".$this->connection->connect_error;
			return false;
		}
	}


	// Insert Data 

	public function insert($data){
		$insert_row = $this->connection->query($data);

		if($insert_row){
			return $insert_row;
		}else{
			return false;
		}
	}



	// Update Data 

	public function update($data){
		$update_row = $this->connection->query($data);

		if($update_row){
			return $update_row;
		}else{
			return false;
		}
	}


	// Select Data 

	public function select($data){
		$select = $this->connection->query($data);

		if($select->num_rows > 0){
			return $select;
		}else{
			return false;
		}
	}


	// Delete Data 

	public function delete($id , $table){

		$query = "DELETE FROM $table WHERE id = $id";

		$result = $this->connection->query($query);

		if ($result == false) {

			echo 'Error: connot delete id ' . $id . 'form table' . $table;
			return false;
		}

		else{
			return true;
		}
	}


}


 ?>