

<?php

	session_start();
	include('../../pages/views/websiteicon.php');
  if(!$_SESSION) {
    header("location:../index.php");
  }
  
  include('./views/header.php');
  include('../actions/getmessages.php');

?>


<title>Messages</title>
<link rel="stylesheet" type="text/css" href="../css/messages.css">
<div class="container">
    <div class="container header-label col-xs-12" id="header">MESSAGES</div>

      <div class="row my-5">

        <div class='col-md-12 col-sm- wrapper'>

            <?php  getMessageEmails();  ?>
    </div>
  </div>
</div>

