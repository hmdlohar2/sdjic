<?php
	require "header.php";
	@require "../db.php";
	if(!isset($_GET['user_id'])){
		header("Location: users.php");
	}
	$userData = sql_query("select * from users where id={$_GET['user_id']}");
?>
	<style type="text/css">
		
	</style>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<form action="adminModel.php" method="POST" id="alumni_add" enctype="multipart/form-data">
			<table class="table">
				<input type="hidden" name="id" value="<?php echo $_GET['user_id']; ?>">
				<tr>
					<td>Name: </td>
					<td><input type="text" class="form-control" name="name" value="<?php echo $userData[0]['name']; ?>"></td>
				</tr>
				<tr>
					<td>Username: </td>
					<td>
						<input type="text" class="form-control" name="username"  value="<?php echo $userData[0]['username']; ?>">
					</td>
				</tr>
				<tr>
					<td>Email: </td>
					<td>
						<input type="email" class="form-control" name="email" value="<?php echo $userData[0]['email']; ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-primary" name="user_update"></td>
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
			}
		}
	});
});

function submit_alumni_add(){

	var form = $(this);
    
	$.ajax({
        url: "adminModel.php?user_update=1",
        type: "POST",
        data: form.serialize(),
        success:function(data){
            console.log(data);
           	if(data=="success"){
				notie.alert({text: "User Updated",type:1});
				setTimeout(function(){
					window.location.assign("users.php");
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
        	notie.alert({ text: "Problem updating user", type: 3 });
            console.log(err.responseText);
        }
    });
    return false;
}
</script>