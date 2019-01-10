<?php
require "../db.php";
require "header.php";
$total_users=sql_query("select count(id) as total from users")[0]['total'];

?>

	
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">       
        <div class="card text-white bg-primary mb-3" style="max-width: 10rem;">
		  <div class="card-header">Total Alumnies</div>
		  <div class="card-body">
		    <span style="font-size:50px;color:green;"><a href="users.php" class="text-white"><?php echo $total_users; ?></a></span>
		  </div>
		</div>  

		<div class="card text-white bg-success mb-3" style="max-width: 10rem;">
		  <div class="card-header">Upcomming Events</div>
		  <div class="card-body">
		    <span style="font-size:50px;color:green;"><a href="orders.php" class="text-white">
		    	
		    	
		    </a></span>
		  </div>
		</div>     
    </main>


<?php 
require "footer.php";
?>