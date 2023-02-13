<?php

class Database{
    protected $db;
    
    public function __construct(){
        $servername = "localhost";
        $dbname= "infobdn";
        $username = "root";
        $password = "";

		$this->db = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }    
}