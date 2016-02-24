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
		if (isset($_POST['fname'])) {
		  // $name = filter_var(trim($_POST['name_element']),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);  
		  // if (!preg_match("#^[aA-zZ\s\-_]+$#",$name))
		  // {
			// echo "Error: invalid name" ;
			// exit();
		  // } 		 
			echo "Name: ".$_POST['fname'];
			echo "<br/>";
		    echo "SName: ".$_POST['sname'];
		    echo "<br/>";
		    echo "Email: ".$_POST['email'];
			echo "<br/>";
			echo "Birthday: ".$_POST['birthday'];
			echo "<br/>";
			echo "Sex: ".$_POST['sex'];		  
			echo "<br/>";
			  
			$data = array(
				'fname' => $_POST['fname'],
				'sname' => $_POST['sname'],
				'email' => $_POST['email'],
				'birthday' => $_POST['birthday'],
				'sex' => $_POST['sex']
			);
			  
			if ($this->model->add_user($data))
			{
				echo "OKKKKKKKKKK";
			}
		}
	}
}
?>