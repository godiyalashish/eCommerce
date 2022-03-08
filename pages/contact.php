<!-- Header -->

<?php

	session_start();

	include('./views/websiteicon.php');

?>

<title>Contact us</title>
<link rel="stylesheet" type="text/css" href="/Lifestyle-store/css/contactus.css">


<?php

	include('./views/header.php');

?>

<!-- Header end -->


<?php if(!isset($_GET['message'])) : ?> <!--checking if there is no message in GET array -->

<div class="container" id='main_container'> <!--content starts ie.live support section-->

	<div class="row" id="live_support">

		<div class="col-md-8">

			<h2>Live Support</h2>
			<div class="container">
				<p>For online technical support, please call on toll free no. +91 90000 00000, 202-555-0191 or just text us during the following hours:</p>
				
				<p><strong>Monday-Friday </strong>8:30AM-9:00PM</p>
				<p><strong>Saturday </strong>8:30AM-6PM</p>
				<p><strong>Sunday </strong>8:30AM-4PM</p>
			</div>
		</div>
		<div class="col-md-4">
			<img id="livesupport-image" src="/lifestyle-store/pages/views/images/livesupporticon.png">
		</div>
		
	</div>

	<!--live support section ends-->

	<!--contact form-->

	<div class="row">
		
		<div class="col-md-8">

				<form method="post" action="/lifestyle-store/actions/messages.php">

					<h1>CONTACT US</h1>
					
					<div class="form-group">
						<input class="form-control" name="email" placeholder="Email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autofocus required>
					</div>

					<div class="form-group">
						<input type="text" name="name" placeholder="Your name" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="subject" placeholder="Subject" class="form-control" >
					</div>
					
					<div class="form-group">	
						<textarea class="form-control" id="text-area" rows="3" placeholder="Message, atleast 500 characters" maxlength="500" name="message" required></textarea>
					</div>

					<small style="color:red;">
						
						<?php

							if(isset($_GET['error'])){  //displaying error if exist in GET array

								echo "<p>".$_GET['error']."</p>";
							}

						?>


					</small>

					<button class="btn btn-primary" type="submit">Submit</button>

				</form>
				
		</div>
		<div class="col-md-4">  <!--company information -->
			<div class="container">

				<h4><strong>Company Information:</strong></h4>
				<p>Srinagar Garhwal, India, 246174</p>
				<p>Phone:+91 90000 00000</p>
				<p>store@lifestyle.com</p>
					
			</div>
		</div>
	</div>

</div>						<!--company information end -->


<!--checking if GET array contain message with value of success and display success message-->


<?php elseif($_GET['message'] == 'success') : ?> 
	<div class="container" id="message">
		
		<div class="alert alert-success">
		
			<p><i class="fa fa-check-circle icon"></i>Your message  success-fully reached us we will reply as soon as possible<a href='/lifestyle-store/pages/products.php'> continue shopping.</a></p>			

		</div>
	</div>

<?php else :?>  <!--else displaying error-->

	<div class="container" id="message">
		
		<div class="alert alert-success">
		
			<p><i class="fa fa-exclamation-triangle icon"></i>Your message didn't reached us please try again<a href='/lifestyle-store/pages/contact.php'> Go back</a></p>			

		</div>
	</div>

<?php endif; ?>



<!-- Footer -->
<?php

	include('./views/footer.php');

?>

<!-- Footer-end -->