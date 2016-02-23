<?php

class Router
{
	static function execute()	
	{		
		$controller = 'Welcome';
		$action = 'index';		
			
		$parts_url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
				
		if (! empty($parts_url[0])) {	
			$controller = $parts_url[0];
		}		
		
		if (! empty($parts_url[1])) {
			$action = $parts_url[1];
		}

		$model_name = $controller.'Model';
		$controller_name = $controller.'Controller';

		$modelFile = strtolower($controller.'_model').'.php';
		$modelPath = "application/models/".$modelFile;
		
		if(file_exists($modelPath)) {
			include "application/models/".$modelFile;
		}

		$controllerFile = strtolower($controller.'_controller').'.php';
		$controllerPath = "application/controllers/".$controllerFile;
		
		if(file_exists($controllerPath)) {
			include "application/controllers/".$controllerFile;
		} else 	{
			throw new Exception('File: "'.$controllerFile.'" does not exist.' );
		}
		
		$controller = new $controller_name(); // create controller
	
		if(method_exists($controller, $action)) {
			$controller->$action(); // call action of controller
		} else 	{
			throw new Exception('Action "'.$action.'" of controller "'.$controller_name.'" does not exist.' );   
		} 
	
	}	
    
}


