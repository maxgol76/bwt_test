<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <title><?= $data['title'] ?></title>

    <!-- Bootstrap -->
	<script type="text/javascript" src="/assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/moment-with-locales.min.js"></script>  
    <script type="text/javascript" src="/assets/js/bootstrap-datetimepicker.min.js"></script>

    <!--load bootstrap css-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />   
	<link href="/assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />   
	<link href="/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href='/styles/style.css' rel='stylesheet' type='text/css' />
   
  </head>
  <body>    
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
			  <a class="navbar-brand" href="/registrat/form">BWT-test</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
			  <ul class="nav navbar-nav">
				<li <?php if (Router::getController() == 'registrat') { ?>class="active" <?php } ?>><a href="/registrat/form">Registration</a></li>
				<li <?php if (Router::getController() == 'weather') { ?>class="active" <?php } ?>><a href="/weather/show">Weather</a></li>
				<li <?php if (Router::getController() == 'contact') { ?>class="active" <?php } ?>><a href="/contact/form">Contact</a></li>
				<li <?php if (Router::getController() == 'feedback') { ?>class="active" <?php } ?>><a href="/feedback/show">Feedback</a></li>
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</nav>

		