<?php
echo "hello";
	if(isset($_POST['upload'])){
	include('../../connection/connection.php');

	$prod_name = $_POST['name'];
	$prod_price = $_POST['price'];

	$query = "INSERT INTO `products` (`prod_name`, `prod_price`) VALUES ('$prod_name', '$prod_price') ;";

			if(mysqli_query($link,$query)){

				// $image = $_FILES['image']['tmp_name'];
				// $name = $_FILES['image']['name'];
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

				// $image = base64_encode(file_get_contents(addslashes($image)));
				$query = "UPDATE `products` SET img = '$image' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
				if(mysqli_query($link,$query)){
					header("location:../pages/addProducts.php?success=T");
				}

}else{
	header('location:../pages/addProducts.php');
}}


?>