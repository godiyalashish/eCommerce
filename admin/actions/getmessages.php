<?php


function number($email){ 

	include('../../connection/connection.php');

	$new_email = mysqli_real_escape_string($link,$email);

	$query = "SELECT COUNT(id) FROM messages WHERE email = '$new_email'";

			$result = mysqli_query($link,$query); //running above query

			$row = mysqli_fetch_array($result); //fetching response from DB

    echo "$row[0]"; 

}

function getMessageEmails(){

	include('../../connection/connection.php');

$query = "SELECT DISTINCT email FROM `messages`";

	$result = mysqli_query($link,$query); //fetching array from products table in DB

	$i = 0;

	while($row = mysqli_fetch_assoc($result)){
		$i++;
		$email = $row['email'];

		echo"<a href='../pages/detailedMessages.php?email=$email'>";
		echo "<ol class='list-group list-group-numbered'>";
            
              echo "<li class='list-group-item d-flex justify-content-between align-items-start'>";
                echo "<div class='ms-2 me-auto'>";
                 echo "<div class='fw-bold name'>$email</div>";
                echo "</div>";
                echo "<span class='badge bg-primary rounded-pill number'>"; number($email); echo"</span>";
              echo "</li>";
          echo "</ol></a>";
}
}

function getmessages($email){

	include('../../connection/connection.php');

	$new_email = $new_email = mysqli_real_escape_string($link,$email);

	$query = "SELECT * FROM messages WHERE email='$new_email'";

	$result = mysqli_query($link,$query); //fetching array from products table in DB

	$i = 0;

	while($row = mysqli_fetch_assoc($result)){
		$i++;
		$email = $row['email'];
		$message = $row['message'];
		$subject = $row['subject'];
		$name = $row['name'];


		echo "<ol class='list-group list-group-numbered'>";
            
              echo "<li class='list-group-item d-flex justify-content-between align-items-start'>";
                echo "<div class='ms-2 me-auto'>";
                 echo "<div class='fw-bold name'>Sender: $name</div>";
                 	echo "<p class='fw-bold'><strong>Subject:</strong> $subject</p>";
                  echo "<p><strong>Message:</strong> $message</p>";
                  
                echo "</div>";
              echo "</li>";
          echo "</ol>";
}
}





?>