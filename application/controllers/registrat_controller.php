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
		$data['title'] = 'Registration';
		
		$this->view->render('header', $data);
		$this->view->render('registrform_view');
		$this->view->render('footer');
	}	
	
	public function validat()
	{			    
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
			    if ( ! $this->ok_check_length($fname, 3, 20)) {
					$msg .= "<div class='alert alert-danger'> First Name is not correct; </div>";
				}
			} else {
				$msg .= "<div class='alert alert-danger'> First Name must be not empty; </div>";
			}		
			
			$sname = $this->clean_data($_POST['sname']); 
			$sname = filter_var($sname, FILTER_SANITIZE_STRING);
			if ( !empty($sname)) {
			    if ( ! $this->ok_check_length($sname, 3, 50)) {
					$msg .= "<div class='alert alert-danger'> Second Name is not correct; </div>";
				}
			} else {
				$msg .= "<div class='alert alert-danger'> Second Name must be not empty; </div>";
			}		
			
			$birthday = $this->clean_data($_POST['birthday']); 
			$birthday = filter_var($birthday, FILTER_SANITIZE_STRING);
			if ( !preg_match('~(\d{4}\-\d{2}\-\d{2})+~', $birthday)) {
				$msg .= "<div class='alert alert-danger'> Birthday is not correct; </div>";
			}  
  
			
			$sex = $_POST['sex'];
			if (empty($sex)) {
				$sex = male;
			}

			if (empty($msg)) {				       
				if ( !$this->model->similar_email($email)) {
					$data = [
						'fname' => $fname,
						'sname' => $sname,
						'email' => $email,
						'sex'   => $sex,
						'birthday' => date('Y-m-d',strtotime($birthday))						
					];			
				
					if ($this->model->add_user($data)) {
						$_SESSION['user_name'] = $fname;
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
	
	public function logout()
	{
		unset($_SESSION['user_name']); 
		session_destroy();
		
		$this->form();
	}
}
