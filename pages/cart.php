<!-- HEADER START -->

<?php

	session_start();

	include('./views/websiteicon.php');

	include('../connection/connection.php');

?>

<title>Lifestyle-store Cart</title>
<link rel="stylesheet" type="text/css" href="/Lifestyle-store/css/cart.css">

<?php

	include('./views/header.php');
?>

<!-- HEADER END -->


<?php


 //checking if user is logged in

	if((array_key_exists('id', $_SESSION) OR array_key_exists('email',$_SESSION)) AND  $_SESSION['user'] == 'customer'){
  
		include('../connection/connection.php');


	}else{
				header("location:/lifestyle-store/pages/login.php");


	}

	if(!empty($_GET)){  //checking if there is any GET variable

		$prod_name = $_GET['name'];
		$prod_price = $_GET['price'];
		$id = $_SESSION['id'];
		$prod_id = $_GET['prod_id'];

		//inserting in carts table data from GET variable

		$query = "INSERT INTO `cart` (prod_name,prod_price,user_id,prod_id) VALUES('$prod_name','$prod_price','$id','$prod_id')";

		$result = mysqli_query($link,$query);

		header("location:/lifestyle-store/pages/cart.php");

	}else{  //else displaying data if data already exist in cart table

		$id = $_SESSION['id'];

		//query to select everything from cart table

		$query = "SELECT * FROM `cart` WHERE user_id = '$id'";

		$result = mysqli_query($link,$query);

		//checking if there is no data in cart table

		if(mysqli_num_rows($result) == 0){

			echo "<div class='container' id='alert'><div class='alert alert-danger'>No items added to cart<a href='/lifestyle-store/pages/products.php'> start shopping</a></div></div>";

		}else{  //else display data in data

				echo "<div class='container' id='carttable'>";

				echo "<table class='table table-hover'>";

				echo "<thead class='thead-dark'>";

				echo "<tr>

						<th>Product name</th>
						<th>Price</th>
						<th>Actions</th>

					 </tr>";

				echo "</thead>";

				while($row = mysqli_fetch_assoc($result)){ //fetching data from DB

					$prod_name = $row['prod_name'];

					$prod_price = $row['prod_price'];

					$prod_id = $row['prod_id'];

					echo "<tr><td>".$row['prod_name']."</td><td>Rs. ".$row['prod_price']."</td><td>

						  <a class='btn btn-primary' href='/lifestyle-store/pages/products.php'><i class='fa fa-arrow-left icon'></i>Go back</a>
						  <a class='btn btn-success' href='/lifestyle-store/pages/success.php?name=$prod_name&price=$prod_price&prod_id=$prod_id'><i class='fa fa-check-circle icon'></i>Confirm order</a>
						  <a class='btn btn-danger' href='/lifestyle-store/actions/delete_prod_from_cart.php?&prod_id=$prod_id><i class='fa fa-trash icon'></i>Delete order</a>
						  </td>
						  </tr>
					";


				}

				echo "</table>";

				echo "</div>";
		}
	}






?>




<!-- Footer -->


<?php

	include('./views/footer.php');

?>


	<!-- Footer end -->