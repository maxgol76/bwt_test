<?php

class FeedbackController extends Controller {

	public function __construct()
	{
		parent::__construct();
		
		//$this->load->model('user_model');	  
	}
	
	public function index()
	{
		echo "Hello from Feedback!";
	}	
	
	public function show()
	{		
		$res = Router::$db->query('SELECT * FROM users');
		echo "<pre>";
		print_r($res);
	}		
}
?>