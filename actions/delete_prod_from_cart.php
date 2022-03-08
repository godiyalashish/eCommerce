<?php

	session_start();

	if(!empty($_GET)){     // checking $_GET array is empty

		include("../connection/connection.php");

		$prod_id = $_GET['prod_id'];

		$id = $_SESSION['id']; 

		// query to delete the selected product from cart table

		$query = "DELETE FROM `cart` WHERE user_id ='$id' AND prod_id = '$prod_id' LIMIT 1";

		mysqli_query($link,$query);//running above query

		header("location:/lifestyle-store/pages/cart.php"); 
	}




?>