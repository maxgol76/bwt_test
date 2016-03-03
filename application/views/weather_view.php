<div class="container">   
  <div class="starter-template">	
<?php 
    if(isset($_SESSION['user_name'])) { ?>
    	<h3>Погода в Запорожье</h3>
		<div id="weath">
		  <?=  $data['weather'];?>	
		</div> 
<?php } else { 
		echo "You are not registered!"; 
	  } ?>
  </div>
</div><!-- /.container -->   
    
