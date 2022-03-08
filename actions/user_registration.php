<?php

	session_start();

	if(array_key_exists('submit', $_POST)){   //checking if there submit inside $_POST array

		include('../connection/connection.php');

		$password_len = strlen($_POST['password']);

		$url = '';

		$email = $_POST['email'];

		$name = $_POST['name'];

		$phone = $_POST['phone'];

		$address = $_POST['address'];

		$city = $_POST['city'];



		if(!$name){  //checking if user has not enterd name and redirect to signup page with error

			$url = $url."&name_error=please enter name.&email=$email&phone=$phone&address=$address&city=$city";

		
		}

		if(!$email){  //checking if user has not enterd name and redirect to signup page with error

			$url = $url."&email_error=please enter email.&phone=$phone&address=$address&city=$city&name=$name";

			
			//checking if entered email address is valid 

		}else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

			$url = $url."&email_error=please enter valid email-address.&phone=$phone&address=$address&city=$city&name=$name";

		}

		//checking if user has not enterd name and redirect to signup page with error


		if(!$_POST['password']){  
			$url = $url."&password_error=please enter password.&phone=$phone&address=$address&city=$city&name=$name&email=$email";

			
		}else if($password_len < 6){ //password entered should be atleast of 6 characters

			$url = $url."&password_error=password should have atleast of 6 characters.&phone=$phone&address=$address&city=$city&name=$name&email=$email";

		}

		if(!$phone){ //checking if user has not enterd phone and redirect to signup page with error


			$url = $url."&phone_error=please enter contact no.&address=$address&city=$city&name=$name&email=$email";

			//checking for valid 10 digit phone no.
		
		}else if(!preg_match('/^\d{10}$/',$phone)){

			$url = $url."&phone_error=please enter correct 10 digit contact no.&address=$address&city=$city&name=$name&email=$email";

		}


		//checking if user has not enterd address and redirect to signup page with error


		if(!$address){ 

			$url = $url."&address_error=please enter address.&phone=$phone&city=$city&name=$name&email=$email";
			
		}

		if(!$city){ //checking if user has not enterd city and redirect to signup page with error


			$url = $url."&city_error=please enter city.&phone=$phone&address=$address&name=$name&email=$email";

		}

		if($url != ''){ //checking if url varible is not empty and redirecting to signup page

			header('location:../pages/signup.php?'.$url);


		}else {

			$reg_email = mysqli_real_escape_string($link,$_POST['email']);
			$reg_name = mysqli_real_escape_string($link,$_POST['name']);
			$reg_password = mysqli_real_escape_string($link,$_POST['password']);
			$reg_address = mysqli_real_escape_string($link,$_POST['address']);
			$reg_city = mysqli_real_escape_string($link,$_POST['city']);
			$reg_phone = mysqli_real_escape_string($link,$_POST['phone']);

			//checking if email entered already exist in DB

			$query = "SELECT id from `users` WHERE email = '$reg_email' LIMIT 1";

			$result = mysqli_query($link,$query);

			//if no. of rows returned is > 0 then email is already registered

			if(mysqli_num_rows($result) > 0){  


				header("location:/lifestyle-store/pages/signup.php?email_error=This email is alredy registered.&phone=$phone&address=$address&city=$city&name=$name&email=$email");
			
			}else{

				//inserting user information in users table using insert query

				$query = "INSERT INTO `users` (email,name,contact,password,city,address) VALUES('$reg_email','$reg_name','$reg_phone','$reg_password','$reg_city','$reg_address')";

				if(mysqli_query($link,$query)){

					//updating user password to md5 hashed form

					$query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$reg_password)."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

					mysqli_query($link,$query);

					header('location:/lifestyle-store/pages/login.php');


				}else{

					//redirect to signup.php if there is error in signing up the user

					$url = $url.'signup_error=Cannot sign you up - please try again later.';

					header('location: /lifestyle-store/pages/signup.php?'.$url);

					exit();
					
				}

			
			}
		}
	}





?>