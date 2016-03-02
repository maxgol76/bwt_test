<?php

require_once 'vendor/autoload.php';

class WeatherController extends Controller 
{
	public function __construct()
	{
		parent::__construct();		
	}
	
	public function index()
	{
		echo "Hello from Weather!";
	}
	
	public function show()
	{			
		$client = new GuzzleHttp\Client();		
		//$res = $client->request('GET', 'https://www.gismeteo.ru'); // Empty reply from server
		$res = $client->request('GET', 'https://sinoptik.ua/%D0%BF%D0%BE%D0%B3%D0%BE%D0%B4%D0%B0-%D0%B7%D0%B0%D0%BF%D0%BE%D1%80%D0%BE%D0%B6%D1%8C%D0%B5');			
			
		$body = $res->getBody();
		
		$document = \phpQuery::newDocumentHTML($body);        
        $data = $document->find(".wMain"); 
		
		$this->view->render('weather_view', $data);		
	}	
}
