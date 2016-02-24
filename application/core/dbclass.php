<?php

class DB
{	
	protected $connect;
	
	public function __construct($host, $user, $password, $dbname)
	{
		$this->connect = new mysqli($host, $user, $password, $dbname);
		
		if(mysqli_connect_error()) {
			throw new Exception('Could not connect to DB "'.$dbname.'"');
		}
	}
	
	public function query($sql)
	{
		if ( ! $this->connect) {
			return false;
		}
		
		$res = $this->connect->query($sql);
		
		if (mysqli_error($this->connect)) {
			throw new Exception(mysqli_error($this->connect));
		}
		
		if (is_bool($result)) {
			return $res ;
		}
		/*
		$data_arr = array();
		
		while($row = mysqli_fetch_assoc($res)) {
			$data_arr[] = $row;
		}
		return $data_arr;*/
		return $res ;		
	}
	
	public function affected_rows()
	{
	  	return mysqli_affected_rows ( $this->connect );
	}
	
	public function escape($str)
	{		
		$string = mysqli_real_escape_string ($this->connect, $str);		
		return $string;
	}	
}
