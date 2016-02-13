<?php
class configuration {
	protected $server;
	protected $username;
	protected $password;
	protected $itemnumber;
	
	public function __construct() {
	$this->server = "127.0.0.1:3306";
	$this->username = "mdadmin";
	$this->password = "45>89pharm";
	$this->itemnumber = "3";
	}
	public function getserver(){
	return $this->server;
	}
	public function getusername(){
	return $this->username;
	}
	public function getpassword(){
	return $this->password;
	}
	public function getitemnumber(){
	return $this->itemnumber;
	}	
}	
?>	