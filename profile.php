
<!DOCTYPE html>
<html lang="en">
<head>
<title>Offers</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/offers_styles.css">
<link rel="stylesheet" type="text/css" href="styles/offers_responsive.css">
<link rel="icon" href="images/logo.png" />
<link rel="stylesheet" type="text/css" href="styles/master.css">
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	<?php require("master.php"); ?>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/about_background.jpg"></div>
		<div class="home_content">
			<div class="home_title">My Profile</div>
		</div>
	</div>

	<!-- Offers -->

	<div class="offers">

		<!-- Search -->

		<div class="search">
			<div class="search_inner">

				<!-- Search Contents -->
				
				<div class="container fill_height no-padding">
					<div class="row fill_height no-margin">
						<div class="col fill_height no-padding">

							<!-- Search Tabs -->

							<div class="search_tabs_container">
								<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><span>personal</span></div>
									<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">educational</div>
									<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">professioanl</div>
									<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start">my batch</div>

									
									
								</div>		
							</div>

							<!-- Search Panel -->

							<div class="search_panel active">
								<form action="#" id="search_form_1" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_item">
										<div>Name</div>
										<input type="text" placeholder="Name" class="destination search_input" required="required">
									</div>
																		<div class="extras">

									<div class="search_item">
										<div>Date Of Birth</div>
										<input type="text" class="check_in search_input" placeholder="DD-MM-YYYY">
									</div>
									</div>
																		<div class="extras">

									<div class="search_item">
										<div>Address</div>
										<textarea class="check_out search_input" placeholder="Address" style="height:100px"rows="20" cols="10"></textarea>
							
									</div>
									</div>
																		<div class="extras">

									<div class="search_item">
										<div>Gender</div>
										<select name="adults" id="adults_1" class="dropdown_item_select search_input">
											<option>MALE</option>
											<option>FEMALE</option>
										</select>
									</div>
									</div>
											<div class="extras">

									<div class="search_item">
										<div>Current City</div>
										<select name="adults" id="adults_1" class="dropdown_item_select search_input">
											<option>Surat</option>
											<option>Mumbai</option>
											<option>Delhi</option>
											<option>Pune</option>
											<option>Rajkot</option>
										</select>
									</div></div>
									<div class="extras">

									<div class="search_item">
										<div>Home City</div>
										<select name="adults" id="adults_1" class="dropdown_item_select search_input">
											<option>Surat</option>
											<option>Mumbai</option>
											<option>Delhi</option>
											<option>Pune</option>
											<option>Rajkot</option>
										</select>
									</div>
									</div>
									<div class="extras">
										<div class="search_item">
											<div>Facebook Profile</div>
											<input type="text" class="destination search_input" required="required">
										</div>
									</div>
									<div class="extras">
										<div class="search_item">
											<div>Linkedin Profile</div>
											<input type="text" class="destination search_input" required="required">
										</div>
									</div>
									<div class="extras">
										<div class="search_item">
											<div>Twitter Profile</div>
											<input type="text" class="destination search_input" required="required">
										</div>
									</div>


									<button class="button search_button">save<span></span><span></span><span></span></button>
								</form>
							</div>

							<!-- Search Panel2 -->
							<div class="search_panel">
								<form action="#" id="search_form_2" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_item">
										<div>Qualification</div>
										<input type="text" placeholder="Qualification" class="destination search_input" required="required">
									</div>
																		<div class="extras">

									<div class="search_item">
										<div>Passing Year</div>
										<input type="text" class="check_in search_input" placeholder="YYYY">
									</div>
									<button class="button search_button">save<span></span><span></span><span></span></button>
								</form>
							</div>
														<!-- Search Panel -->

							<div class="search_panel">
								<form action="#" id="search_form_3" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_item">
										<div>destination</div>
										<input type="text" class="destination search_input" required="required">
									</div>
									<div class="search_item">
										<div>check in</div>
										<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>check out</div>
										<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>adults</div>
										<select name="adults" id="adults_3" class="dropdown_item_select search_input">
											<option>01</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<div class="search_item">
										<div>children</div>
										<select name="children" id="children_3" class="dropdown_item_select search_input">
											<option>0</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<button class="button search_button">search<span></span><span></span><span></span></button>
								</form>
							</div>


							<!-- Search Panel 4-->

							<div class="search_panel">
								<form action="#" id="search_form_4" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_item">
										<div>destination</div>
										<input type="text" class="destination search_input" required="required">
									</div>
									<div class="search_item">
										<div>check in</div>
										<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>check out</div>
										<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>adults</div>
										<select name="adults" id="adults_4" class="dropdown_item_select search_input">
											<option>01</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<div class="search_item">
										<div>children</div>
										<select name="children" id="children_4" class="dropdown_item_select search_input">
											<option>0</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<button class="button search_button">search<span></span><span></span><span></span></button>
								</form>
							</div>





							</div>
						</div>

			</div>
		</div>		
	</div>

	<!-- Footer -->
	<?php require("master_FOOTER.php"); ?>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/isotope.pkgd.min.js"></script>
<script src="plugins/easing.js"></script>
<script src="plugins/parallax.min.js"></script>
<script src="js/offers_custom.js"></script>

</body>

</html>