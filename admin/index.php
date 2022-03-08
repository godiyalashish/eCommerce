<?php
	session_start();

	include('../pages/views/websiteicon.php');

?>

<title>Lifestyle-store Login</title>
<link rel="stylesheet" type="text/css" href="/Lifestyle-store/css/login.css">

<!-- Header-end -->

<!-- Login form container-->

<?php 

	if ($_SESSION) header("location:./pages/dashboard.php");

?>


	<div class="container">
		
		<div class="row">
			
			<div class="col-md-4"></div>

			<div class="col-md-4">

				<!-- <login form starts -->
				
				<form method="post" action="./actions/admin_login.php">

					<center><div id="icon"><i class="far fa-user fa-4x"></i></div></center>

					<div class="container" id="form-container">

					<h2>Admin Log in</h2>
					
					<div class="form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
						</div>
						<input type="email" name="email" placeholder="email" class="form-control" autofocus>
					</div>

					<div class="form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" name="password" placeholder="password" class="form-control">
					</div>

					<small style = "color:white;">

    					<?php  //displaying error if GET array contain that 

    						if(isset($_GET['error'])){

    							echo $_GET['error'];

    						}

    					?>
    						
    					</small>


					<input class="btn btn-block" type="submit" name="submit" value="login" id="submitbutton">
				</div>

				</form>

	<!-- form ends -->

			<div class="col-md-4"></div>

		</div>

	</div>

	<!-- Form container ends -->
