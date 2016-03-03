
<div class="container">           
  <div class="starter-template">    

	<form role="form" id="form-feedback">
	  <div id="alert-msg"></div>
	  <h3 class="form-signin-heading">Tell Us What You Think:</h3>
	  <div class="form-group">
		<label for="inputName" class="sr-only">Name</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Name" pattern="[A-Za-z]{3,20}" required autofocus>			
	  </div>
	  <div class="form-group">
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>			
	  </div>
	  <div class="form-group">
		<textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Message" required></textarea>			
	  </div>
		
	  <hr>  	  <!--CAPTCHA-->
	  <img id="img-captcha" src="/application/core/captcha/captcha.php">
	  
	  <div id="reload-captcha" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Update</div>
	  
	  <div class="form-group has-feedback">
		<label id="label-captcha" for="captcha" class="control-label" style="display: none;">Please enter the code:</label>
		<input id="text-captcha" name="captcha" type="text" class="form-control" required="required" placeholder="Please enter the Security code" value="">
		<span class="glyphicon form-control-feedback"></span>
	  </div>				   
	 
	  <button class="btn btn-primary btn-lg" type="submit" id="feedbackSubmit" name="submit_feedback" >Send Feedback</button>
	</form>
	
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
						} 
				}
			});
			return false;
		});	 
		
</script>  