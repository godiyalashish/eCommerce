<!--Header -->

<?php

	session_start();

	include('./views/websiteicon.php');

	include('../connection/connection.php');

?>

<title>Settings</title>
<link rel="stylesheet" type="text/css" href="/Lifestyle-store/css/settings.css">

<?php

	include('./views/header.php');
?>

	<!-- Header end -->

<?php

	//checking if user is logged in

	if((array_key_exists('id', $_SESSION) OR array_key_exists('email', $_SESSION)) AND $_SESSION['user'] == 'customer'){ 


	include('../connection/connection.php');


	}else{
		header("location:/lifestyle-store/pages/login.php");
		
	}


?>


<!-- if no success index in GET array then displaying setting form-->
<?php if(!isset($_GET['sucess'])) : ?>


<div class="container">
		
		<div class="row">
			
			<div class="col-md-4"></div>

			<div class="col-md-4" id="form-container">

				<!-- Form starts -->

				<form action="/lifestyle-store/actions/password_change.php" method="post" class="form-group">

					<center><div id="icon"><i class="fas fa-cog fa-4x"></i></div></center>

			<h2>Change Password</h2>
			
			<div class="form-group input-group-lg">
    			<input type="password" class="form-control" placeholder="Old-password" name="oldpassword" autofocus required>
  			</div>

  			<div class="form-group input-group-lg">
    			<input type="password" class="form-control" placeholder="New-password" name="newpassword" pattern=".{6,}" required>
  			</div>

  			<div class="form-group input-group-lg">
    			<input type="password" class="form-control" placeholder="Confirm-password" name="confirmpassword" pattern=".{6,}" required>
  			</div>
			

			<small style="color: red; margin-bottom:8px">
				
				<?php

				//displaying error if it is in GET array

					if(isset($_GET["error"])){

						echo $_GET["error"]."<br>";
					}

				?>

			</small>

			<input type="submit" class="btn btn-primary btn-block" value="Change Password" name="submit" id="submitbutton">

		</form>
				
				<!-- Form ends -->

			</div>

			<div class="col-md-4"></div>

		</div>

	</div>

	<!-- if there is success in GET array then displaying success message -->

	<?php else : ?> 

		<div class="container" id="sucessmessage">
    
		<div class="alert alert-success container" role="alert">
			
			<p><?php echo $_GET['sucess']." " ?><a href="/lifestyle-store/pages/products.php"><strong>continue shopping</strong></a></p>

		</div>
	</div>


<?php endif; ?>


	
	<!-- Footer -->


<?php

	include('./views/footer.php');

?>


	<!--Footer end