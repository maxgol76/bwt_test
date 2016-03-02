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
		
		return $res ;		
	}
	
	public function query_sel($sql)
	{
		if ( ! $this->connect) {
			return false;
		}
		
		$res = $this->connect->query($sql);
		
		if (mysqli_error($this->connect)) {
			throw new Exception(mysqli_error($this->connect));
		}	
		
		$data = array();
		
		while($row = mysqli_fetch_assoc($res)) {
			$data[] = $row;
		}
		
		return $data ;		
	}
	
	public function affected_rows()
	{
	  	return mysqli_affected_rows ( $this->connect );
	}
	
	public function escape_string($str)
	{		
		$string = mysqli_real_escape_string ($this->connect, $str);		
		return $string;
	}	
	public function num_rows($result)
	{
		return mysqli_num_rows($result);
	}
}
