<!-- HEADER START -->

<?php

	session_start();

	include('./views/websiteicon.php');

	include('../connection/connection.php');

?>

<title>Lifestyle-store Cart</title>
<link rel="stylesheet" type="text/css" href="/Lifestyle-store/css/success.css">

<?php

	include('./views/header.php');
?>

<!-- HEADER END -->


<?php

	if(!$_SESSION['id'] OR $_SESSION['user']=='admin'){ //checking if user is logged in

		header("location:/Lifestyle-store/pages/login.php");
		exit();
	}

	if(!empty($_GET)){

		include('../connection/connection.php');

		$prod_name = $_GET['name'];

		$prod_price = $_GET['price'];

		$prod_id = $_GET['prod_id'];

		$id = $_SESSION['id'];

		//inserting the confirmed order data in confirmed_orders table in DB

		$query = "INSERT INTO `confirmed_orders` (prod_name,prod_price,user_id,prod_id) VALUES('$prod_name','$prod_price','$id','$prod_id')";

		$result = mysqli_query($link,$query);

		if($result){ //if query is successfull then displayiong success message

			echo "<div class='container' id='message'>

					<div class='alert alert-success'><i class='fa fa-check-circle icon'></i>Your order <strong>'".$_GET['name']."'</strong> request has been received sucessfully<a href='/lifestyle-store/pages/products.php'> continue shopping.</a></div>

			</div>";
		
		}else{ //else displaying error message

			echo "<div class='container' id='message'>

					<div class='alert alert-success'>Sorry cannot process your request please try later<a href='/lifestyle-store/pages/products.php'> continue shopping.</a></div>

			</div>";
		}

		//deleting the confirmed order from cart table

		$query = "DELETE FROM `cart` WHERE `user_id` = '$id' AND `prod_id` = '$prod_id' LIMIT 1";

		$result = mysqli_query($link,$query); //running the above query


		//inserting the order details in order_history table stored in DB

		$query = "INSERT INTO `order-history` (user_id,prod_name,prod_price,prod_id) VALUES('$id','$prod_name','$prod_price','$prod_id')";

		mysqli_query($link,$query); //running above query


	}


?>






<!-- Footer -->

<?php

	include('./views/footer.php');

?>
	<!-- Footer end -->