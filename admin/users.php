<?php
require "../db.php";
require "header.php";

?>

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    

          <h2>Alumnies
			
          <a class="btn btn-sm btn-primary float-right " href="add_alumni.php">Add Alumni</a>
          </h2>

          <div class="table-responsive">
            <div class="table table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
             
                  
                </tr>
              </thead>

              <tbody>
              	<?php 
              	$allCliparts=sql_query("select id,name,email from users");
              	
              	
              	foreach ($allCliparts as $key => $value) {
              		echo "<tr>
		                  <td>{$value['id']}</td>
		                  <td>{$value['name']}</td>
		                  <td>{$value['email']}</td>
		                  
		                  
		                  <td>";
		                  ?>
		                 
		                  <?php
		                  echo "</td>
		                </tr>";
              	}
              ?>
                
                
              </tbody>
            </table>
          </div>
          
        </main>


<?php 
require "footer.php";
?>