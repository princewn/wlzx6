<?php

class declarations {
	//Database Declarations
	private $database_username;
 	private $database_dbName;
 	private $database_password;
 	private $database_serverURL;
 	private $con;

	//Table structures
 	public $structure_login;
 	
 	//Email Addresses
 	public $email_webmaster;
 	public $email_from;

 	//URL
 	public $confirm_url;
 	private $reset_url;
 	
	public function populateVariables() {
		
		//Database declarations
 		$this->database_username = "127.0.0.1";
 		$this->database_dbName = "wlzx";
 		$this->database_password = "090232";
 		$this->database_serverURL = "server";

		//Table structures
 		$this->structure_login = "(username, password, emailAddress, hash, confirmed)";
		
		//Email Addresses
		$this->email_webmaster = "DLUTSSnetwork@163.com";
 		$this->email_from = "DLUTSSnetwork@163.com";
 		
 		//URL
 		$this->confirm_url = "http://localhost/wlzx6/Ajax-Login-master/authorize.php?hash=";
 		$this->reset_url = "http://localhost/wlzx6/Ajax-Login-master/reset.php?ticket=";
	}

	public function database_username(){
		$this->populateVariables();
		return $this->database_username;
	}

	public function database_password(){
		$this->populateVariables();
		return $this->database_password;
	}

	public function database_dbName(){
		$this->populateVariables();
		return $this->database_dbName;
	}

	public function database_serverURL(){
		$this->populateVariables();
		return $this->database_serverURL;
	}
	public function structure_login(){//??
		$this->populateVariables();
		return $this->structure_login;
	}
	public function email_webmaster(){
		$this->populateVariables();
		return $this->email_webmaster;
	}

	public function email_from(){
		$this->populateVariables();
		return $this->email_from;
	}
	
	public function confirm_url(){
		$this->populateVariables();
		return $this->confirm_url;
	}
	
	public function reset_url(){
		$this->populateVariables();
		return $this->reset_url;
	}
	
	public function connectDB(){
		$this->populateVariables();
		$database_dbName = $this->database_dbName();
		$database_password = $this->database_password();
		$database_serverURL = $this->database_serverURL();
		$database_username = $this->database_username();

/*		$this->con = new mysqli("$database_serverURL","$database_serverURL","$database_password","$database_dbName");*/
        $con=mysql_connect('localhost','donahue','090232');
        mysql_select_db('wlzx',$con);
        return $con;		
	}
}

?>
