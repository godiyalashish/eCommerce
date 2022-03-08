<?php

function getProducts(){
	if(isset($_SESSION))

include('../../connection/connection.php');
$query = "SELECT * FROM `products`";

		$result = mysqli_query($link,$query);

		//checking if there is no data in cart table

		if(mysqli_num_rows($result) == 0){

			echo "<div class='container' id='alert'><div class='alert alert-danger'>No Products added<a href='../pages/addProducts.php'> Add Products</a></div></div>";

		}else{  //else display data in data 

				echo "<div class='container' id='producttable'>";

				echo "<table class='table table-hover'>";

				echo "<thead class='thead-dark'>";

				echo "<tr>

						<th></th>
						<th>Product name</th>
						<th>Price</th>
						<th></th>

					 </tr>";

				echo "</thead>";

				while($row = mysqli_fetch_assoc($result)){ //fetching data from DB

					$prod_name = $row['prod_name'];

					$prod_price = $row['prod_price'];

					$prod_id = $row['id'];

					$img = $row['img'];


					echo "<tr><td>";echo'<img src="data:image/jpeg;base64,'.base64_encode( $img ).'" alt="product" class="img"/>';echo"</td>
					<td>".$row['prod_name']."</td><td>Rs. ".$row['prod_price']."</td>
						  </tr>
					";


				}

				echo "</table>";

				echo "</div>";
		}
	}


?>