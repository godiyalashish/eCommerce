<?php

	session_start();
	include('../../pages/views/websiteicon.php');
  if(!$_SESSION) {
    header("location:../index.php");
  }
  
  include('./views/header.php');
  include('../actions/confirmedProducts.php');

?>

<title>Confirmed orders</title>
<link rel="stylesheet" type="text/css" href="../css/products.css">
<link rel="stylesheet" type="text/css" href="../css/messages.css">

<div class="container">
    <div class="container header-label col-xs-12" id="header">Confirmed Orders</div>
<?php   getConfirmedProducts(); ?>
</div>