<?php

	session_start();
	include('../../pages/views/websiteicon.php');
  if(!$_SESSION) {
    header("location:../index.php");
  }
  
  include('./views/header.php');
  include('../actions/getProductsList.php');

?>

<title>Delete Product</title>
<link rel="stylesheet" type="text/css" href="../css/products.css">
<?php   getProducts(); ?>