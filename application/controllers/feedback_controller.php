<?php
include "application/models/contact_model.php";

class FeedbackController extends Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		$this->model = new ContactModel();  
	}
	
	public function index()
	{
		echo "Hello from Feedback!";
	}	
	
	public function show()
	{		
		$data = $this->model->show_feedback();
		$this->view->render('feedback_view', $data);
	}		
}
