<?php

class View
{
	//protected $data;
    protected $path;

    public function __construct()
	{    
	    $this->path = '';
	}
	
	public function render($viewFile, $data=null)
	{		
		$this->path = 'application/views/'.$viewFile.'.php' ;
		
		if( !file_exists($this->path) ) {
			throw new Exception('File for View: "'.$this->path.'" does not exist.' );
		} 
		
		include $this->path;
	}	
}
