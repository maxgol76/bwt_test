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
				<li><a href="/registrat/form">Registration</a></li>
				<li><a href="/weather/show">Weather</a></li>
				<li class="active"><a href="/contact/form">Contact</a></li>
				<li><a href="/feedback/show">Feedback</a></li>
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</nav>

		<div class="container">
           
		  <div class="starter-template">
		    
		<div id="contact_form" class="row">    
    
		<form role="form" id="form-feedback">
		  <div id="alert-msg"></div>
		  <h3 class="form-signin-heading">Tell Us What You Think:</h3>
		  <div class="form-group">
			<input type="text" class="form-control" id="name" name="name" placeholder="Name">
			<span class="help-block" style="display: none;">Please enter your name.</span>
		  </div>
		  <div class="form-group">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
			<span class="help-block" style="display: none;">Please enter e-mail address.</span>
		  </div>
		  <div class="form-group">
			<textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Message"></textarea>
			<span class="help-block" style="display: none;">Please enter a message.</span>
		  </div>
		    
		  <hr>  	  <!--CAPTCHA-->
	      <img id="img-captcha" src="/application/core/captcha/captcha.php">
          
	      <div id="reload-captcha" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Update</div>
		  
		  <div class="form-group has-feedback">
			<label id="label-captcha" for="captcha" class="control-label" style="display: none;">Please enter the code:</label>
			<input id="text-captcha" name="captcha" type="text" class="form-control" required="required" placeholder="Please enter the code" value="">
			<span class="glyphicon form-control-feedback"></span>
		  </div>				   
		 
		  <button class="btn btn-primary btn-lg" type="submit" id="feedbackSubmit" name="submit_feedback" >Send Feedback</button>
		</form>
	  
	    </div><!--/row-->	  
		  
		  
		  </div>

		</div><!-- /.container -->   
		
		<script type="text/javascript">
		    $(document).ready(function() {				
					$("#reload-captcha").click(function() {					  
					  $('#img-captcha').attr('src', '/application/core/captcha/captcha.php');
					});  
				});			
				
			$("#form-feedback").submit(function() {
					var form_data = $('#form-feedback').serialize(); 
					//alert (form_data);
					
					$.ajax({
						url: "/contact/validat",
						type: 'POST',
						data: form_data,
						success: function (msg) {							
								$('#alert-msg').html(msg);						
								
								if (msg.indexOf('success')!=-1) {
									
									//$('#form-feedback').delay(2000).fadeOut(1000);
								} 
						}
					});
					return false;
				});	 
				
		</script>
    
  </body>
</html>