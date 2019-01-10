<?php
require "../db.php";
require "header.php";

?>

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    

          <h2>Events
			
          <a class="btn btn-primary float-right " href="event_add.php">Add Event</a>
          </h2>

          <div class="table-responsive">
            <div class="table table-responsive">
            <table id="mainTable" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
             
                  
                </tr>
              </thead>

              <tbody>
              	<?php 
              	$allCliparts=sql_query("select * from events ");
              	
              	
              	foreach ($allCliparts as $key => $value) {
              		echo "<tr>
		                  <td>{$value['name']}</td>
		                  <td>{$value['description']}</td>
                      <td>{$value['start_date']}</td>
		                  <td>{$value['end_date']}</td>
		                  
		                  
		                  <td>";
		                  ?>
									                 
		                  <?php
		                  echo "
		                  	<a class='btn btn-info' href='user_update.php?event_id={$value['id']}'> Update</a>
		                  	<a class='btn btn-danger' href='#' onclick='deleteUser({$value['id']},this)'> Delete</a>
		                  </td>
		                  	
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#mainTable ').DataTable();
} );
function deleteUser(user_id,e){
	if(!confirm("Do You really want to delete event?")){
		return;
	}
	$.ajax({
        url: "adminModel.php?event_delete=1",
        type: "POST",
        data: {
        	id: user_id
        },
        success:function(data){
            console.log(data);
           	if(data=="success"){
				notie.alert({text: "Event Deleted",type:1});
				
				$(e).parents("tr").remove()
			}
			else{
				
					notie.alert({text: "Problem deleting event",type:3});
				
			}
        },
        error:function(err){
        	notie.alert({ text: "Unexpected error", type: 3 });
            console.log(err.responseText);
        }
    });
}

</script>