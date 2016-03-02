<?php

class ContactModel extends Model 
{
	public function __construct()
	{
		parent::__construct();
	}	
		
	public function add_feedback($data) 
	{	
		$sql = "INSERT INTO messages (name, email, message) VALUES ('$data[name]', '$data[email]', '$data[message]')";		
        $this->db->query($sql);		  
		 
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
		    return false;
		} 
	}

    public function show_feedback() 
	{	
		$sql = "SELECT * FROM messages";		
        $data = $this->db->query_sel($sql);		  
		return $data;
	}				

    public function real_escape_string($data)
	{
		return $this->db->escape_string($data);
	} 			
}
?>