<?php
require "header.php";
?>
	<style type="text/css">
		
	</style>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<form action="adminModel.php" method="POST" id="alumni_add" enctype="multipart/form-data">
			<table class="table">
					<td><input type="hidden" class="form-control" name="type"></td>
				<tr>
					<td>Event Name: </td>
					<td><input type="text" class="form-control" name="name"></td>
				</tr>
				<tr>
					<td>Event Description: </td>
					<td><input type="text" class="form-control" name="description"></td>
				</tr>
				<tr>
					<td>Start Date: </td>
					<td>
						<input type="date" class="form-control" name="start_date">
					</td>
				</tr>
				<tr>
					<td>End Date: </td>
					<td>
						<input type="email" class="form-control" name="end_date">
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-primary" name="users_add"></td>
				</tr>
			</table>
		</form>
    </main>


<?php 
require "footer.php";
?>

<script type="text/javascript" src="plugins/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#alumni_add").submit(submit_alumni_add);
	$("#alumni_add").validate({
		rules:{
			name: "required",
			description:"required"
		},
		messages:{
			name: "Enter Name",
			description: "Description is needed"
		}
	});
});

function submit_alumni_add(){

	var form = $(this);
    
	$.ajax({
        url: "adminModel.php?event_add=1",
        type: "POST",
        data: form.serialize(),
        success:function(data){
            console.log(data);
           	if(data=="success"){
				notie.alert({text: "Event is Added",type:1});
				setTimeout(function(){
					window.location.assign("events.php");
				}, 2000);
			}
			else{
				if(data=="missingData"){
					notie.alert({text: "Please Fill up form properly",type:3});
				}
				else{
					notie.alert({text: "Unexpected Error.",type:3});
				}
			}
        },
        error:function(err){
        	notie.alert({ text: "Problem inserting alumni", type: 3 });
            console.log(err.responseText);
        }
    });
    return false;
}
</script>