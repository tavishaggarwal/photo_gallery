<?php

require 'user.php';

class Photograph extends MYSQLDatabase{
		protected static $table_name = 'photographs';
		public $id;
		public $filename;
		public $type;
		public $size;
		public $caption;
		private $temp_path;
		protected $upload_dir="/var/www/html/photo_gallery/public/images";
		public $error;
		protected $upload_errors = array(
			// http               ://www.php.net/manual/en/features.file-upload.errors.php
			UPLOAD_ERR_OK         => "No errors.",
			UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize.",
			UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
			UPLOAD_ERR_PARTIAL    => "Partial upload.",
			UPLOAD_ERR_NO_FILE    => "No file.",
			UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
			UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
			UPLOAD_ERR_EXTENSION  => "File upload stopped by extension."
        );

public function attach_file($file){
	
	$this->temp_path = $file['tmp_name'];
	$this->filename  = basename($file['name']);
	$this->type      = $file['type'];
	$this->size      = $file['size'];

		if(move_uploaded_file($this->temp_path,$this->upload_dir."/".$this->filename)){
		echo "Sucessfully updated";
		}
		else{
		$this->error = $file['error'];
		echo "<p>".$this->upload_errors[$this->error]."<p>";
		}
}

public function create(){
		
			global $database;
			
			$stmt = 'INSERT INTO '.self::$table_name. '(id, filename, type, size,caption) 
			VALUES (:id, :filename, :type, :size, :caption)';
			
			$database->query($stmt);
			
			$database->bind(':id', '');
			$database->bind(':filename', $this->filename);
			$database->bind(':type', $this->type);
			$database->bind(':size', $this->size);
			$database->bind(':caption', $this->caption);
			
			$database->execute();
}

public function delete_photo(){

	global $user;
	$user->id=$_GET['id'];
	$user->delete('photographs');
}

}
$photo = new Photograph();

?>