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
		//$client = new Client();
		//$res = $client->request('GET', 'http://www.yandex.ru');
		//$res = $client->request('GET', 'https://www.gismeteo.ua/city/daily/5093/' );
		
		$client = new GuzzleHttp\Client();
		//$res = $client->request('GET', 'https://sinoptik.ua/%D0%BF%D0%BE%D0%B3%D0%BE%D0%B4%D0%B0-%D0%B7%D0%B0%D0%BF%D0%BE%D1%80%D0%BE%D0%B6%D1%8C%D0%B5');
		$res = $client->request('GET', 'https://www.gismeteo.ua');
		
		//echo $res->getStatusCode();
		/* работает
		$client = new GuzzleHttp\Client();
			$res = $client->request('GET', 'https://api.github.com/user', [
				'auth' => ['maxgol76@gmail.com', 'lubov77']
			]);
			echo $res->getStatusCode();
			// 200
			echo "<br/>";
			echo $res->getHeaderLine('content-type');
			echo "<br/>";
			// 'application/json; charset=utf8'*/
			
		$body = $res->getBody();
		$data = $body->getContents();
		$this->view->render('weather_view', $data);
		
		// $client = new Client([
						// // Base URI is used with relative requests
						// 'base_uri' => 'https://www.gismeteo.ua',
						// // You can set any number of default request options.
						// 'timeout'  => 2.0,
					// ]);
					
					
		// $response = $client->request('GET', 'city/daily/5093');			
		
		//echo $res->getStatusCode();
		// "200"
		//echo $res->getHeader('content-type');
		// 'application/json; charset=utf8'
		
		//$data = $res->getBody();
		
		// {"type":"User"...'

		// Send an asynchronous request.
		//$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
		//$promise = $client->sendAsync($request)->then(function ($response) {
			//echo 'I completed! ' . $response->getBody();
		//});
		//$promise->wait();

/*	
		$client = new Client("http://www.gismeteo.ua/city/daily/5093/");
		
		$request = $client->get('/API/jsonI.php?length=10&type=uint8');
		
		$response = $request->send();
	
		$body = $response->getBody(true);		
		*/
		
		
		
		
	}	
}
