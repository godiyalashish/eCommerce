<?php

function getProducts(){

include('../../connection/connection.php');
$query = "SELECT * FROM `products`";

		$result = mysqli_query($link,$query);

		//checking if there is no data in cart table

		if(mysqli_num_rows($result) == 0){

			echo "<div class='container' id='alert'><div class='alert alert-danger'>No Products added<a href='../pages/addProducts.php'> Add Products</a></div></div>";

		}else{  //else display data in data

			if(isset($_GET['success'])){

				if($_GET['success'] == 'T'){
					echo "<div class='container' id='hideMe'><div class='alert alert-success'>Product Deleted successfully</div></div>";
				}else{
					echo "<div class='container' id='hideMe'><div class='alert alert-danger'>Could not delete product!</div></div>";
				}
			}

				echo "<div class='container' id='producttable'>";

				echo "<table class='table table-hover'>";

				echo "<thead class='thead-dark'>";

				echo "<tr>

						<th>Product image</th>
						<th>Product name</th>
						<th>Price</th>
						<th>Action</th>

					 </tr>";

				echo "</thead>";

				while($row = mysqli_fetch_assoc($result)){ //fetching data from DB

					$prod_name = $row['prod_name'];

					$prod_price = $row['prod_price'];

					$prod_id = $row['id'];

					$img = $row['img'];


					echo "<tr><td>";echo'<img src="data:image/jpeg;base64,'.base64_encode( $img ).'" alt="product" class="img"/>';echo"</td>
					<td>".$row['prod_name']."</td><td>Rs. ".$row['prod_price']."</td><td>
						  <a class='btn btn-danger' href ='../actions/deleteAproduct.php?prod_id=$prod_id'><i class='fa fa-trash icon'></i>Delete Product</a>
						  </td>
						  </tr>
					";


				}

				echo "</table>";

				echo "</div>";
		}
	}
	

?>
