<?php

class RegistratModel extends Model 
{
	public function __construct()
	{
		parent::__construct();
	}	
		
	public function add_user($data) 
	{	
		$sql = "INSERT INTO users (fname, sname, email, sex, birthday) 	VALUES ( '$data[fname]', '$data[sname]', '$data[email]', '$data[sex]', '$data[birthday]')";		
        $this->db->query($sql);		  
		 
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
		    return false;
		} 
	}	
	
	public function similar_email ($email)  // проверка на схожесть email
    {	
		$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";		
        $res = $this->db->query($sql);	
		
        if ($this->db->num_rows($res) > 0) {
			return true;
		} else {
		    return false;
		} 		
    }

    public function real_escape_string($data)
	{
		return $this->db->escape_string($data);
	} 		
	
}
?>