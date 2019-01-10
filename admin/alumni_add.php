<?php
require "header.php";
?>
	<style type="text/css">
		
	</style>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<form action="dataModel.php" method="POST" enctype="multipart/form-data">
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

<script type="text/javascript">
$(document).ready(function(){
	$.ajax({
        url: "adminModel.php",
        type: "POST",
        data:{
        	get_print_type:<?php echo $id; ?>,
        },
        dataType:"json",
        success:function(data){
            console.log(data);
            if(data.length==0){
            	notie.alert({ text: "Print type not found", type: 3 });
            }
            else{
            	$("input[name=name]").val(data[0].name);
            	$("input[name=price]").val(data[0].price);
            	$("textarea[name=description]").val(data[0].description);
            }
        },
        error:function(err){
        	notie.alert({ text: "Problem Loading Data", type: 3 });
            console.log(err.responseText);
        }
    });
});
</script>