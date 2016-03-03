<div class="container">   
  <div class="starter-template">	
<?php 
    if(isset($_SESSION['user_name'])) { 
		      foreach($data['feedback'] as $dat){ ?>
				<div><strong> <?=$dat['name'];?></strong></div>				
				<div> <?=$dat['message'];?></div>
				<br/>
<?php         } 		
	} else { 
		echo "You are not registered!"; 
	} ?>
  </div>
</div><!-- /.container -->   
 