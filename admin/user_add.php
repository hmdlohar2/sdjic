<?php
require "header.php";
?>
	<style type="text/css">
		
	</style>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<form action="adminModel.php" method="POST" id="alumni_add" enctype="multipart/form-data">
			<table class="table">
				<tr>
					<td>Name: </td>
					<td><input type="text" class="form-control" name="name"></td>
				</tr>
				<tr>
					<td>Username: </td>
					<td>
						<input type="text" class="form-control" name="username">
					</td>
				</tr>
				<tr>
					<td>Email: </td>
					<td>
						<input type="email" class="form-control" name="email">
					</td>
				</tr>
				<tr>
					<td>Password: </td>
					<td>
						<input type="password" class="form-control" name="password">
					</td>
				</tr>
				<tr>
					<td>Select Role: </td>
					<td>
						<select name="user_role">
							<option value="alumni"> Alumni</option>
							<option value="admin"> Admin</option>
						</select>
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
			email:{
				email:true,
				required: true
			},
			username: {
				required:true,
				minlength: 8
			},
			password:{
				required: true,
				minlength: 8
			}
		},
		messages:{
			name: "Enter Name",
			email: {
				required: "Email is Required",
				email: "Enter Proper Email"
			},
			username: {
				required:'Username is Required',
				minlength: "Username must be atleast 8 latters"
			},
			password:{
				required: "Password is Required",
				minlength: "Password must be atleast 8 latters"
			}
		}
	});
});

function submit_alumni_add(){

	var form = $(this);
    
	$.ajax({
        url: "adminModel.php?users_add=1",
        type: "POST",
        data: form.serialize(),
        success:function(data){
            console.log(data);
           	if(data=="success"){
				notie.alert({text: "You are registered successfully",type:1});
				setTimeout(function(){
					window.location.assign("users.php");
				}, 2000);
			}
			else{
				if(data=="missingData"){
					notie.alert({text: "Please Fill up form properly",type:3});
				}
				else if(data=="userExist"){
					notie.alert({text: "Username is already exist.",type:3});
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