<?php

require 'config.php';

class MYSQLDatabase{

	protected static $table_name = 'users';

    private $host   = DB_HOST;
    private $user   = DB_USER;
    private $pass   = DB_PASS;
    private $dbname = DB_NAME;
 
    private $dbh;
    private $error;
    private $stmt;

 
    public function authenticate($username, $password){

        $result= $this->query("SELECT * FROM " .self::$table_name. " WHERE 
                 username = '$username' AND password = '$password' ");

        $this->execute();
        
        if($this->rowCount() == 1){
        
           $result = $this->single();
           return $result;
        }
    }

    public function __construct(){
       
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
        PDO::ATTR_PERSISTENT    => true,
        PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_ERRMODE       => PDO::ERRMODE_SILENT
        );
        // Create a new PDO instanace
        try{
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch(PDOException $e){
        $this->error = $e->getMessage();
        }
    }

    public function query($query){

         $this->stmt = $this->dbh->prepare($query);
    }

    public function execute(){

        return $this->stmt->execute();
    }

    public function resultset(){

        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function bind($param, $value, $type = null){

        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function single(){

        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){

        return $this->stmt->rowCount();
    }

    public function lastInsertId(){

         return $this->dbh->lastInsertId();
    }


}

$database = new MYSQLDatabase();


?>