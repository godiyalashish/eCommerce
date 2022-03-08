	<!-- Header -->

<?php

	include('./views/websiteicon.php');

?>

<title>Lifestyle-store Registration</title>
<link rel="stylesheet" type="text/css" href="/Lifestyle-store/css/signup.css">

<?php

	include('./views/header.php');
?>

	<!-- Header end -->




	<div class="container">
		<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">


            <!-- Sign up Form  sending information to registration.php script-->


			<form method="post" action="/Lifestyle-store/actions/user_registration.php">

        <center><div id="icon"><i class="fa fa-user-plus fa-4x"></i></div></center>

        <div class="container" id="form-container">

				<h2>Create Account</h2>

				<h4 style = "color:white;">
					<?php 

          //checking if GET array contains error and displaying it

						if(isset($_GET['signup_error'])){ 

							echo "<br>".$_GET['signup_error']."<br>";

						}


					?>
				</h4>
				
				<div class="form-group input-group-lg">

					<?php

						if(isset($_GET['name'])){ //checking GET array contain name

							$name=$_GET['name'];

 //if GET array contain name then input tag value is made equal to name from GET array

							echo '<input name ="name" type="text" required class="form-control" id="name" placeholder="Name" value="'.$name.'">';

						}else{

							echo '<input name ="name" type="text"class="form-control" id="name" placeholder="Name"  required autofocus>';
						}


					?>
    				  <small style = "color:white;">

    					<?php  

              //checking for name_error in GET array and displaying it

    						if(isset($_GET['name_error'])){

    							echo $_GET['name_error'];

    						}

    					?></small>
  				</div>


  				<div class="form-group input-group-lg">

  					<?php

  						if(isset($_GET['email'])){

  							$email = $_GET['email'];

//if GET array contain email then input tag value is made equal to email from GET array

  							echo '<input name ="email" type="email" class="form-control" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="'.$email.'">';

  						}else{

  							echo '<input name ="email" type="email" class="form-control" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="enter email in format:john@gmail.com" required>';

  						}


  					?>
    				<small style = "color:white;">

    					<?php  

              //checking for email_error in GET array and displaying it

    						if(isset($_GET['email_error'])){

    							echo $_GET['email_error'];

    						}

    					?></small>  
  				</div>


  				<div class="form-group input-group-lg">
    				<input name ="password" type="password" class="form-control" id="password" placeholder="Password" pattern=".{6,}"  required>

    				<small style = "color:white; padding-left: 3px;">

    					<?php  

              //checking for password_error in GET array and displaying it

    						if(isset($_GET['password_error'])){

    							echo $_GET['password_error'].'<br>';

    						}

    					?></small> 

    				<small><i class="fa fa-info" aria-hidden="true"></i>Passwords must be at least of 6 characters.</small>
    				 
  				</div>


  				<div class="form-group input-group-lg">

  					<?php

  						if(isset($_GET['phone'])){

  							$phone = $_GET['phone'];

//if GET array contain phone then input tag value is made equal to phone from GET array

  							echo '<input name ="phone" type="text" class="form-control" id="phone" placeholder="Contact" value="'.$phone.'"  pattern="[A-Za-z0-9]+">';
  						}else{


  							echo '<input name ="phone" type="text" class="form-control" id="phone" placeholder="Contact"  pattern="[A-Za-z0-9]+" required>';
  						}


  					?>
    				<small style = "color:white;">

    					<?php  

              //checking for phone_error in GET array and displaying it

    						if(isset($_GET['phone_error'])){

    							echo $_GET['phone_error'];

    						}

    					?></small> 
  				</div>


  				<div class="form-group input-group-lg">

  					<?php

  						if(isset($_GET['address'])){

  							$address = $_GET['address'];

//if GET array contain address then input tag value is made equal to address from GET array

  							echo '<input name ="address" type="text" class="form-control" id="address" placeholder="Address" value="'.$address.'">';

  						}else{

  							echo '<input name ="address" type="text" class="form-control" id="address" placeholder="Address">';
  						}

  					?>
    				<small style = "color:white;">

    					<?php  

              //checking for address_error in GET array and displaying it

    						if(isset($_GET['address_error'])){

    							echo $_GET['address_error'];

    						}

    					?></small>  
  				</div>


  				<div class="form-group input-group-lg">

  					<?php

  						if(isset($_GET['city'])){

  							$city = $_GET['city'];

      //if GET array contain city then input tag value is made equal to city from GET array

  							echo '<input name ="city" type="text" class="form-control" id="city" placeholder="City" value="'.$city.'">';
  						}else{

  							echo '<input name ="city" type="text" class="form-control" id="city" placeholder="City">';
  						}


  					?>
    				<small style = "color:white;">

    					<?php  

              //checking for city_error in GET array and displaying it

    						if(isset($_GET['city_error'])){

    							echo $_GET['city_error'];

    						}

    					?></small>  
  				</div>

  				<input class="btn btn-block" type="submit" name="submit" value="Sign up" id="submitbutton">

  				<div id="signinlink"> <!--login link-->
  					<p>Already have an account? <a href="login.php">Sign in</a></p>
  			 	</div>
         </div>


			</form>


                            <!-- Form end -->


		</div>
		<div class="col-md-3"></div>
		</div>
	</div>


	
	<!-- Footer -->


<?php

	include('./views/footer.php');

?>


	<!-- Footer end -->