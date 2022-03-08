<?php

	session_start();

		include("../connection/connection.php");

		$name = $_POST['name'];

		$email = $_POST['email'];

		$subject = $_POST['subject'];

		$message = $_POST['message'];


		if(!$name){   //checking that var name is empty and sending the error

			header("location:/lifestyle-store/pages/contact.php?error=name is required");

			exit();

		}
		if(!$email){  //checking that var email is empty and sending the error

			header("location:/lifestyle-store/pages/contact.php?error=email is required");

			exit();

		}
		if(!$subject){  //checking that var subject is empty and sending the error

			header("location:/lifestyle-store/pages/contact.php?error=subject is required");

			exit();

		}
		if(!$message){  //checking that var subject is empty and sending the error

			header("location:/lifestyle-store/pages/contact.php?error=message is required");

			exit();

		}else{

			$email = mysqli_real_escape_string($link,$_POST['email']);

			$name = mysqli_real_escape_string($link,$_POST['name']);

			$subject = mysqli_real_escape_string($link,$_POST['subject']);

			$message = mysqli_real_escape_string($link,$_POST['message']);

			//query to insert the message,name,email,subject to messages table in DB 

			$query = "INSERT INTO `messages` (name,email,subject,message) VALUES('$name','$email','$subject','$message')";

			$result = mysqli_query($link,$query); //running above query

			if($result){ //if query runs then redirect to contact.php page with message of sucess

				header("location:/lifestyle-store/pages/contact.php?message=success");

			}else{ //else message is set to unsuccessfull

				header("location:/lifestyle-store/pages/contact.php?message=unsuccessfull");
			}
		}




?>