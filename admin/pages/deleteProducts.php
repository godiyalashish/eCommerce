<?php

	session_start();
	include('../../pages/views/websiteicon.php');
  include('./views/header.php');

  if(!$_SESSION) {
    header("location:../index.php");
  }
  include('../actions/deleteProduct.php');

?>

<title>Delete Product</title>
<link rel="stylesheet" type="text/css" href="../css/products.css">
<?php   getProducts(); ?>