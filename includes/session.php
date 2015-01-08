<?php

class Session{

  	private $logged_in = false;
  	public $user_id;
    public $message;

    function __construct(){
        session_start();
        $this->check_message();
        $this->check_login();
    }

    public function check_message(){
      if(isset($_SESSION['message'])){
        $this->message = $_SESSION['message'];
        unset($_SESSION['message']);
      }
    }

    public function message($msg){
      if(!empty($msg)){
        $_SESSION['message'] = $msg;
      }
    }

    private function check_login() {
          if(isset($_SESSION['id'])) {
            $this->user_id = $_SESSION['id'];
            $this->logged_in = true;
          } else {
              unset($this->user_id);
              $this->logged_in = false;
            }
    }

    public function is_logged_in(){

        	return $this->logged_in;
    }

    public function login($user) {
        // database should find user based on username/password
          if($user){
           $this->user_id = $_SESSION['id'] =$user;
           $this->logged_in = true;
          }
    }
          
    public function logout() {
        unset($_SESSION['id']);
        unset($this->user_id);
        $this->logged_in = false;
    }

}

$session = new Session();


?>

