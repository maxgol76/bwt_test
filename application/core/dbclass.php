<?php

class DB
{	
	protected $connect;
	
	public function __construct($host, $user, $password, $dbname)
	{
		$this->connect = new mysqli($host, $user, $password, $dbname);
		
		if(mysqli_connect_error()) {
			throw new Exception('Could not connect to DB');
		}
	}
	
	public function query($sql)
	{
		if (! $this->connect) {
			return false;
		}
		
		$res = $this->connect->query($sql);
		
		if (mysqli_error($this->connect)) {
			throw new Exception(mysqli_error($this->connect));
		}
		
		if ( is_bool($result)) {
			return $res ;
		}
		
		$data_arr = array();
		
		while($row = mysqli_retch_assoc($res)) {
			$data_arr[] = $row;
		}
		return $data_arr;
	}
	
	public function escape($str)
	{
		return mysqli_escape_string($this->connect, &str);
	}	
}
