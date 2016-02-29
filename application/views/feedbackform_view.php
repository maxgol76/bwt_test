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
				<li><a href="#about">Weather</a></li>
				<li><a href="#contact">Contact</a></li>
				<li class="active"><a href=/feedback/form">Feedback</a></li>
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</nav>

		<div class="container">
           
		  <div class="starter-template">
		    <!--h2><?= $data?></h2-->  
			<div id="contact_form" class="row">
	    <div class="col-12 col-sm-12 col-lg-12">
		<h2>Tell Us What You Think...</h2>
    
		<form role="form" id="feedbackForm">
		  <div class="form-group">
			<input type="text" class="form-control" id="name" name="name" placeholder="Name">
			<span class="help-block" style="display: none;">Please enter your name.</span>
		  </div>
		  <div class="form-group">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
			<span class="help-block" style="display: none;">Please enter a valid e-mail address.</span>
		  </div>
		  <div class="form-group">
			<textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Message"></textarea>
			<span class="help-block" style="display: none;">Please enter a message.</span>
		  </div>
		  <img id="captcha" src="library/vender/securimage/securimage_show.php" alt="CAPTCHA Image" />
		  <a href="#" onclick="document.getElementById('captcha').src = 'library/vender/securimage/securimage_show.php?' + Math.random(); return false" class="btn btn-info btn-sm">Show a Different Image</a><br/>
		  <div class="form-group" style="margin-top: 10px;">
			<input type="text" class="form-control" name="captcha_code" id="captcha_code" placeholder="For security, please enter the code displayed in the box." />
			<span class="help-block" style="display: none;">Please enter the code displayed within the image.</span>
		  </div>
		   
		  <span class="help-block" style="display: none;">Please enter a the security code.</span>
		  <button type="submit" id="feedbackSubmit" class="btn btn-primary btn-lg" style="display: block; margin-top: 10px;">Send Feedback</button>
		</form>
	  </div><!--/span-->
	</div><!--/row-->
		  
		  
		  
		  </div>

		</div><!-- /.container -->   
		
		<script type="text/javascript">
		    $(document).ready(function() {
				  $("#feedbackSubmit").click(function() {
					//clear any errors
					contactForm.clearErrors();
				 
					//do a little client-side validation -- check that each field has a value and e-mail field is in proper format
					var hasErrors = false;
					$('#feedbackForm input,textarea').each(function() {
					  if (!$(this).val()) {
						hasErrors = true;
						contactForm.addError($(this));
					  }
					});
					var $email = $('#email');
					if (!contactForm.isValidEmail($email.val())) {
					  hasErrors = true;
					  contactForm.addError($email);
					}
				 
					//if there are any errors return without sending e-mail
					if (hasErrors) {
					  return false;
					}
				 
					//send the feedback e-mail
					$.ajax({
					  type: "POST",
					  url: "library/sendmail.php",
					  data: $("#feedbackForm").serialize(),
					  success: function(data)
					  {
						contactForm.addAjaxMessage(data.message, false);
						//get new Captcha on success
						$('#captcha').attr('src', 'library/vender/securimage/securimage_show.php?' + Math.random());
					  },
					  error: function(response)
					  {
						contactForm.addAjaxMessage(response.responseJSON.message, true);
					  }
				   });
					return false;
				  }); 
				});
				 
				//namespace as not to pollute global namespace
				var contactForm = {
				  isValidEmail: function (email) {
					var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					return regex.test(email);
				  },
				  clearErrors: function () {
					$('#emailAlert').remove();
					$('#feedbackForm .help-block').hide();
					$('#feedbackForm .form-group').removeClass('has-error');
				  },
				  addError: function ($input) {
					$input.siblings('.help-block').show();
					$input.parent('.form-group').addClass('has-error');
				  },
				  addAjaxMessage: function(msg, isError) {
					$("#feedbackSubmit").after('<div id="emailAlert" class="alert alert-' + (isError ? 'danger' : 'success') + '" style="margin-top: 5px;">' + $('<div/>').text(msg).html() + '</div>');
				  }
				};
		
		</script>
    
  </body>
</html>