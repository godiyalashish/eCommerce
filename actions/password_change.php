<?php

	session_start();

	if(array_key_exists('submit', $_POST)){  //checking if there submit inside $_POST array

		include('../connection/connection.php');

		$old = mysqli_real_escape_string($link,$_POST['oldpassword']); 

		$new = mysqli_real_escape_string($link,$_POST['newpassword']);

		$confirm = mysqli_real_escape_string($link,$_POST['confirmpassword']);

		$id = $_SESSION['id'];

		if(!$old){  //checking if old password is empty and sending error to setting page

			header('location:/lifestyle-store/pages/settings.php?error=please enter old password');

			exit();
		}

		if(!$new){   //checking if new password is empty

			header('location:/lifestyle-store/pages/settings.php?error=please enter new password');

			exit();

		}else if (strlen($new) < 6) {  //checking if new password is less than 6 characters
			
			header('location:/lifestyle-store/pages/settings.php?error=please enter atleast 6 characters');

			exit();

		}else if($old == $new){

			header('location:/lifestyle-store/pages/settings.php?error=your old and new passwords are same please enter diffrent');
		}

		if(!$confirm){  //checking if user has not confirmed password

			header('location:/lifestyle-store/pages/settings.php?error=please confirm new password');

			exit();

		}else if($confirm != $new){  //checking old password = new password

			header('location:/lifestyle-store/pages/settings.php?error=please enter same password in confirm field as in new password field');

			exit();
		}

		//selecting everthing from users table from DB

		$query = "SELECT * FROM `users` WHERE id = $id"; 

		$result = mysqli_query($link,$query); //running above query

		$row = mysqli_fetch_array($result); //fetching response from database

		if(isset($row)){  //checking if there is array returned by DB 

			$hashedPassword = md5(md5($row['id']).$old); 

			$orignalpassword = $row['password'];

			//comparing password fetched from DB and password entered by user

			if($hashedPassword == $orignalpassword){  

				$newhashed = md5(md5($row['id']).$new); 

				//query updating the new password in place of old password in users table

				$query = "UPDATE `users` SET password = '$newhashed' WHERE id = '$id' LIMIT 1";

				$result = mysqli_query($link,$query);

				header("location: /lifestyle-store/pages/settings.php?sucess=Password changed sucessfully");

			
			}else{ //redirecting user to setting.php with error

				header("location: /lifestyle-store/pages/settings.php?error=old password is wrong");

				exit();


			}
			}else{ //redirecting user to setting.php with error

				header("location:/lifestyle-store/pages/settings.php?error=unable to change password please try again later");

		}
	}
?>