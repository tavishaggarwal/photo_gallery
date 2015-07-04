<?php

require 'database.php';

class User{

    public $username;
	public $password;
    public $first_name;
    public $last_name;


	public function create(){
			
				global $database;
				
				$stmt = 'INSERT INTO '.self::$table_name. '(id, username, password, first_name,last_name) 
				VALUES (:id, :username, :password, :first_name, :last_name)';
				
				$database->query($stmt);
				
				$database->bind(':id', '');
				$database->bind(':username', $this->username);
				$database->bind(':password', $this->password);
				$database->bind(':first_name', $this->first_name);
				$database->bind(':last_name', $this->last_name);
				
				$database->execute();
	}

	public function update(){

					global $database;
					
					$stmt = 'UPDATE '.self::$table_name. ' SET `username`= :username, `password`= :password, `first_name`=:first_name,
					`last_name`=:last_name WHERE id=:id';
					
					$database->query($stmt);
					
					$database->bind(':id', $this->id);
					$database->bind(':username', $this->username);
					$database->bind(':password', $this->password);
					$database->bind(':first_name', $this->first_name);
					$database->bind(':last_name', $this->last_name);
					
					$database->execute();	
	}

	public function delete($table){
			
				global $database;
				$stmt = 'DELETE FROM '.$table. ' WHERE `id` = :id';
				$database->query($stmt);
				
				$database->bind(':id', $this->id);
				
				$database->execute();
	}

}

$user = new User();

?>