<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration</title>

    <!-- Bootstrap -->
	<script type="text/javascript" src="/assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/moment-with-locales.min.js"></script>
   

    <!--load bootstrap css-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />   
	<link href="/assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />   
    <link href='/styles/style.css' rel='stylesheet' type='text/css' />
   
  </head>
  <body>    
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#">BWT-test</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="/registrat/form">Registration</a></li>
				<li><a href="#about">Weather</a></li>
				<li><a href="#contact">Contact</a></li>
				<li><a href="/feedback/show">Feedback</a></li>
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</nav>

		<div class="container">
           
		  <div class="starter-template">
		    <!--h2><?= $data?></h2-->  
			<form  action="/registrat/validat" role="form" method="post" class="form-horizontal">
			<h3 class="form-signin-heading">Please register:</h3>
			<input class="form-control" placeholder="First Name" name="fname" type="text"  pattern="[A-Za-z]{3,}" required autofocus>
			<input class="form-control" placeholder="Second Name" name="sname" type="text" pattern="[A-Za-z]{6,}"required>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required >
			
			<label class="radio-inline">Sex:</label>
			<label class="radio-inline">
			  <input type="radio" name="sex" id="inlineRadio1" value="male"> Male
			</label>
			<label class="radio-inline">
			  <input type="radio" name="sex" id="inlineRadio2" value="female"> Female
			</label>
            <input class="form-control" placeholder="yyyy-mm-dd (Birthday)" name="birthday" type="text" pattern="[\d-]{10,10}" >			
			
			<!--
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
             title="с"
			> -->
			
			<button class="btn btn-lg btn-primary btn-block" type="submit" id="btnsignup">Sign up</button>
		  </form>
		  
		  
		  
		  </div>

		</div><!-- /.container -->   
    
  </body>
</html>