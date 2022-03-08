<!-- HEADER START -->

<?php

	session_start();

	include('./views/websiteicon.php');

	include('../connection/connection.php');

?>

<title>Your Orders</title>
<link rel="stylesheet" type="text/css" href="/Lifestyle-store/css/cart.css">

<?php

	include('./views/header.php');

	if(isset($_SESSION['id']) AND $_SESSION['user']=='customer'){

		include("../connection/connection.php");
	
	}else{

		header("location:/lifestyle-store/pages/login.php");
	}
?>

<!-- HEADER END -->

<?php

	$id = $_SESSION['id'];

//selecting everything from order-history table from DB

	$query = "SELECT * FROM `order-history` WHERE user_id = '$id'";

	$result = mysqli_query($link,$query);

	if(mysqli_num_rows($result) == 0){ //if table conatin no data displaying message

		echo "<div class='container' id='alert'>

				<div class='alert alert-danger'>

					<p>No items ordered yet <a id='link' href='/lifestyle-store/pages/products.php'>Start shopping</a></p>

				</div>
		</div>";

	}else{ //else displaying the contents in table

		echo "<div class='container' id='carttable'>";

				echo "<table class='table table-hover'>";

				echo "<thead  class='thead-dark'>";

				echo "<tr>

						<th>Product name</th>
						<th>Price</th>
						<th>Date</th>

					 </tr>";

				echo "</thead>";

				//fetching array from DB and displaying data

				while($row = mysqli_fetch_assoc($result)){

					$time = date("Y-m-d", strtotime($row['date']));

					echo "<tr><td>".$row['prod_name']."</td><td>Rs. ".$row['prod_price']."</td><td>".$time."</td></tr>";

				}

				echo "</table>";

				echo "</div>";
	}



?>





<!-- Footer -->


<?php

	include('./views/footer.php');

?>


	<!-- Footer end -->