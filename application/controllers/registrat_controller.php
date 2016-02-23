<?php

class RegistratController extends Controller {

	public function __construct()
	{
		parent::__construct();
		
		//$this->load->model('user_model');	  
	}
	
	public function index()
	{
		echo "Hello from Registrat!";
	}
	
	public function form()
	{		
		$data = 'Here will be Form!';
		$this->view->render('formregistr_view', $data);
	}
}
?>