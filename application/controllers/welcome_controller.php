<?php

class WelcomeController extends Controller {

	public function __construct()
	{
		parent::__construct();
		
		//$this->load->model('user_model');	  
	}
	
	public function index()
	{
		echo "Hello from Welcome !!!!!!!!!!!!!!!";
		//$this->load->view('welcome_message');
	}
}
?>