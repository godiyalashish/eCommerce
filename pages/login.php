<!-- Header -->

<?php

	include('./views/websiteicon.php');

?>

<title>Lifestyle-store Login</title>
<link rel="stylesheet" type="text/css" href="/Lifestyle-store/css/login.css">

<?php

	include('./views/header.php');

?>


<!-- Header-end -->

<!-- Login form container-->


	<div class="container">
		
		<div class="row">
			
			<div class="col-md-4"></div>

			<div class="col-md-4">

				<!-- <login form starts -->
				
				<form method="post" action="/Lifestyle-store/actions/user_login.php">

					<center><div id="icon"><i class="far fa-user fa-4x"></i></div></center>

					<div class="container" id="form-container">

					<h2>Log in</h2>
					
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

				<div id="signuplink"> <!--signup link-->
						
						<p>New to Lifestyle-store<a href="signup.php"> REGISTER HERE</a></p>	

					</div>
			</div>

			<div class="col-md-4"></div>

		</div>

	</div>

	<!-- Form container ends -->




<?php

	include('./views/footer.php');

?>