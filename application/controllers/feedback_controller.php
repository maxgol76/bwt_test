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
		$data['title'] = 'Feedback';
		$data['feedback'] = $this->model->show_feedback();			
		
		$this->view->render('header', $data);
		$this->view->render('feedback_view', $data);
		$this->view->render('footer');

	}		
}
