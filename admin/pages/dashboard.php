<?php

	session_start();
  include('../actions/countMessages.php');
	include('../../pages/views/websiteicon.php');
  if(!$_SESSION) {
    header("location:../index.php");
  }
?>
<title>Dashboard</title>

<link rel="stylesheet" type="text/css" href="../css/dashboard.css">

<?php
  include './views/header.php';
?>


	<div class="container">
		<div class="container header-label col-xs-12 headlabel" id="header">DASHBOARD</div>
      <div class="row my-5">
        <div class='col-md-3 col-sm-6 wrapper'>
          <a href="deleteProducts.php">
          <div class='container action'>
            <center><i class="far fa-trash-alt fa-5x icon"></i></center>
            <div class='caption'>
            <h3>DELETE PRODUCTS</h3>
      </div> 
    </div>
    </a> 
    </div>

    <div class='col-md-3 col-sm-6 wrapper'>
      <a href="./addProducts.php">
          <div class='container action'>
            <center><i class="far fa-plus-square fa-5x"></i></center>
            <div class='caption'>
            <h3>ADD PRODUCTS</h3>
      </div> 
    </div>
    </a> 
    </div>

    <div class='col-md-3 col-sm-6 wrapper'>
      <a href="./confirmedProducts.php">
          <div class='container action'>
            <center><i class="fas fa-shipping-fast fa-5x"></i></center>
            <div class='caption'>
            <h3>CONFIRMED PRODUCTS</h3>
      </div> 
    </div> 
  </a>
    </div>

    <div class='col-md-3 col-sm-6 wrapper'>
      <a href="./messages.php">
            <div class='container action'>
            <center>
              <i class="fas fa-comment fa-5x"><div id="message"><?php number(); ?></div></i>
            </center>
            <div class='caption'>
            <h3>MESSAGES</h3>
      </div> 
    </div>
    </a> 
    </div>



  </div>
</div>
	


