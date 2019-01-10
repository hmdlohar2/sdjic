
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<link rel="icon" href="images/logo.png" />
<link rel="stylesheet" type="text/css" href="styles/master.css">
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	<?php require("master.php"); ?>
	<div style="margin-top:7%;"></div>
	<!--LOGIN -->
	<div class="row">
		<div class="super_container">
		<!-- Top Bar -->
		<div>
			<div style="padding:0;">
				<div style="border:1px solid white">
					<div style="border:0px solid red;width:100%;" class="col d-flex flex-row">
						<div style="border:0px solid yellow; width:120%;">
							<!--LOGIN FORM-->
							<div>
  
							  <form class="modal-content animate contact_form_container" style="border:0px solid green;width:50%;" action="dataModel.php" method="POST">
								<!--INPUT FIELDS-->
									<h1 class="home_title">LOGIN</h1>
								<div class="container">
									<div style="border:1px solid white;height:50px;background:#fff;padding:1px;">
										<i class="fa fa-user faas" aria-hidden="true" style="font-size:30px;"></i>
										<input type="text" placeholder="Username" style="float:left;width:10%;" name="username" required>
									</div>
									<br />
									<div style="border:1px solid white;height:50px;background:#fff;padding:1px;">
										<i class="fa fa-lock faas" aria-hidden="true" style="font-size:30px;"></i>
										<input type="password" placeholder="Password" style="float:left;width:20%;" name="password" required>
									</div>
									
								  <input type="submit" id="form_submit_button" class="form_submit_button button trans_200" style="background-color: #31124b;letter-spacing:15px;" name="login" value="Login.."/>
								  <hr />
								  <!-- <label>
									<input type="checkbox" checked="checked" name="remember"> Remember me
								  </label> -->
								</div>
								<!-- CANCEL - FORGOT -->
								<div class="container" >
								  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
								  <span class="psw"><a href="#">Forgot Password?</a></span>
								</div>
							  </form>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
	<!--LOGIN END -->
	

	<!-- Footer -->

	<?php require("master_FOOTER.php"); ?>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/parallax.min.js"></script>
<script src="js/contact_custom.js"></script>

</body>

</html>