<?php

	session_start();
	include('../../pages/views/websiteicon.php');
  if(!$_SESSION) {
    header("location:../index.php");
  }
  
  include('./views/header.php');
  include('../actions/getmessages.php');
  $email = $_GET['email'];

?>

<title>Messages</title>
<link rel="stylesheet" type="text/css" href="../css/messages.css">
<div class="container">
    <div class="container header-label col-xs-12" id="header">MESSAGES</div>

      <div class="row my-5">
        <div class="container"><h4>Emails from: <?php echo"$email";?></h4></div>

        <div class='col-md-12 col-sm- wrapper'>

            <?php  //displaying email if GET array contain that 

                if(isset($email)){

                  getmessages($email);

                }else{
                  header('location:./messages.php');
                }

              ?>
    </div>
  </div>
</div>