
	<div class="container">           
	  <div class="starter-template">
		<?php if(isset($_SESSION['user_name'])) {
                 echo "Registered user: ".$_SESSION['user_name']; ?>
				 <br/><br/>
                 <a href="/registrat/logout">LogOut</a>
        <?php    } else { ?>		
				<form  action="" role="form" method="post" class="form-horizontal" id="form-registr">
				  <div id="alert-msg"></div>
				  <h3 class="form-signin-heading">Please register:</h3>
				  
				  <input class="form-control" placeholder="First Name" name="fname" type="text"  pattern="[A-Za-z]{3,20}" required autofocus>
				  <input class="form-control" placeholder="Second Name" name="sname" type="text" pattern="[A-Za-z]{6,50}"required>
				  
				  <label for="inputEmail" class="sr-only">Email address</label>
				  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required >
				
				  <label class="radio-inline">Sex:</label>
				  <label class="radio-inline">
					<input type="radio" name="sex" id="inlineRadio1" value="male"> Male
				  </label>
				  <label class="radio-inline">
					<input type="radio" name="sex" id="inlineRadio2" value="female"> Female
				  </label>           
				  
				  <input type="text" class="form-control" id="datetimepicker1" placeholder="Birthday" name="birthday" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" >
				  <!--input class="form-control" placeholder="yyyy-mm-dd (Birthday)" name="birthday" type="text" pattern="[\d-]{10,10}" -->										
				  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit_reg" id="btnsignup">Sign up</button>
				</form>		  
	   <?php } ?>
	  </div>
	</div><!-- /.container -->  

	<script type="text/javascript">
		$(document).ready(function() {			
			$('#datetimepicker1').datetimepicker({
			pickTime: false,
			format: 'YYYY-MM-DD'
			});			
			
			$("#form-registr").submit(function() {
				var form_data = $('#form-registr').serialize(); 
				//alert (form_data);
				
				$.ajax({
					url: "/registrat/validat",
					type: 'POST',
					data: form_data,
					success: function (msg) {							
							$('#alert-msg').html(msg);						
							
							if (msg.indexOf('success')!=-1) {
								$('#form-registr').delay(2000).fadeOut(1000);
							} 
					}
				});
				return false;
			});			
		});
			
	</script>    
			