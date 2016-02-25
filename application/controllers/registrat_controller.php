<?php

class RegistratController extends Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->model = new RegistratModel();		
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
	
	public function validat()
	{		
		//if (isset($_POST['submit_reg'])) {		    
		if ($_POST) {		    
			$msg = '';			
			$email = $this->clean_data($_POST['email']); 
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);			
			if ( !empty($email)) {
			    if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$msg .= "<div class='alert alert-danger'> Email address is not correct; </div>";
				}
			} else {
				$msg .= "<div class='alert alert-danger'> Email address must be not empty; </div>";
			}
		  
		    $fname = $this->clean_data($_POST['fname']); 
			$fname = filter_var($fname, FILTER_SANITIZE_STRING);
			if ( !empty($fname)) {
			    if ( ! $this->ok_check_length($fname, 3, 50)) {
					$msg .= "<div class='alert alert-danger'> First Name is not correct; </div>";
				}
			} else {
				$msg .= "<div class='alert alert-danger'> First Name must be not empty; </div>";
			}		

			if (empty($msg)) {
				       // если нет такого же email в БД то OK 
				if ( !$this->model->similar_email($email)) {
					$data = array(
						'fname' => $fname,
						'sname' => $_POST['sname'],
						'email' => $email,
						'birthday' => $_POST['birthday'],
						'sex' => $_POST['sex']
					);			
				
					if ($this->model->add_user($data)) {
						$msg .= "<div class='alert alert-success text-center'>Registration has been successfully!</div>";
					} else {
						$msg .= "<div class='alert alert-danger'> Registration failed, Please try again. </div>";
					}
					
				} else {
					$msg .= "<div class='alert alert-danger'> This email: \"$email\" already exists; </div>";
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
