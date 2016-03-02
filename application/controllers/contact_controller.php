<?php

class ContactController extends Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->model = new ContactModel(); 
	}
	
	public function index()
	{
		echo "Hello from Contact!";
	}	
	
	public function form()
	{		
		$data = 'Contact Form!';
		$this->view->render('contactform_view', $data);
	}	
	
	public function validat()
	{			    
		if ($_POST) {		    
			$msg = '';						
			$name = $this->clean_data($_POST['name']); 
			$name = filter_var($name, FILTER_SANITIZE_STRING);
			
			if ( !empty($name)) {
			    if ( !$this->ok_check_length($name, 3, 50)) {
					$msg .= "<div class='alert alert-danger'> Name is not correct; </div>";
				}
			} else {
				$msg .= "<div class='alert alert-danger'> Name must be not empty; </div>";
			}		
			
			$email = $this->clean_data($_POST['email']); 
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);			
			
			if ( !empty($email)) {
			    if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$msg .= "<div class='alert alert-danger'> Email address is not correct; </div>";
				}
			} else {
				$msg .= "<div class='alert alert-danger'> Email address must be not empty; </div>";
			}  		   
			
			$message = $this->clean_data($_POST['message']); 
			$message = filter_var($message, FILTER_SANITIZE_STRING);
			if ( !empty($message)) {
			    if ( ! $this->ok_check_length($message, 6, 1000)) {
					$msg .= "<div class='alert alert-danger'> Message is not correct; </div>";
				}
			} else {
				$msg .= "<div class='alert alert-danger'> Message must be not empty; </div>";
			}			
			
			if (empty($msg)) {				       
				$data = [
					'name'  => $name,						
					'email' => $email,
					'message' => $message						
				];			
			
				if ($this->model->add_feedback($data)) {
					$msg .= "<div class='alert alert-success text-center'>Feedback send has been successfully!</div>";
				} else {
					$msg .= "<div class='alert alert-danger'> Feedback send failed, Please try again. </div>";
				}					
			}
            
            echo $msg;			
		}
	}
	
	protected function clean_data($data = "") 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = strip_tags($data);
		$data = htmlspecialchars($data);
		$data = $this->model->real_escape_string($data);
		return $data;
	}
	
	protected function ok_check_length($data = "", $min, $max)
	{
		return (mb_strlen($data) >= $min && mb_strlen($data) <= $max);		 
	}	
}
?>