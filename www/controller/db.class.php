<?php
class bd {
	protected $_conn;
	
	public function __construct($host,$user,$pass,$db){
		$this->_conn = new mysqli($host,$user,$pass,$db) or die ("Error connect database");
	}
}
?>