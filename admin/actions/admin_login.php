<?php

	session_start();

	if(array_key_exists('submit', $_POST)){   //checking if there submit inside $_POST array

		$error = '';

		include('../../connection/connection.php');

		$user_email = mysqli_real_escape_string($link,$_POST['email']);

		$user_password = mysqli_real_escape_string($link,$_POST['password']);

		if(!$user_email){  //checking if there is no email entered

			header('location:../index.php?error=Please enter email');
			exit();
		}

		if(!$user_password){  //checking if there is no password entered

			header('location:../index.php?error=Please enter the password');
		
		}else{

	//query selecting everything from users table where email id is eual to email entered by user

		$query = "SELECT * from `admin` WHERE email = '$user_email' LIMIT 1";

			$result = mysqli_query($link,$query); //running above query

			$row = mysqli_fetch_array($result); //fetching response from DB

			echo $row['password'];

			if(isset($row)){  //checking if there is array returned by DB

				$hashedPassword = md5(md5($row['id']).$user_password);

				//comparing password entered by user and that stored in DB

				if($hashedPassword == $row['password']){

					$_SESSION['id'] = $row['id'];  //creating session id

					$_SESSION['email'] = $row['email'];

					$_SESSION['user'] = 'admin';

					header('location:../pages/dashboard.php');  //logging user in

				}else{

					//redirect user to login page if password/email combination is not found

					header('location:../index.php?error=Your password wrong');
				}

			}else{

				//redirect user to login page if email enterd by user is not same as in DB

				header('location:../index.php?error=This email is not registered.');
			}
		}

	}



?>