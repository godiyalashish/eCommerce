<?php

	session_start();
	include('../../pages/views/websiteicon.php');
  if(!$_SESSION) {
    header("location:../index.php");
  }
	include('../../connection/connection.php');

	if(isset($_GET['prod_id'])) {


		$prod_id = $_GET['prod_id'];


		$query = "DELETE FROM products WHERE id ='$prod_id' LIMIT 1";

		if($result = mysqli_query($link,$query)){

		//checking if there is no data in cart table

		header('location:../pages/deleteProducts.php?success=T');}

		else{
			header('location:../pages/deleteProducts.php?success=F');
		}

	}


?>