<?php

	// logging out the user

	session_start();
	session_unset(); //unsetting the session id
	session_destroy();//destroying the session id

	header("location:/lifestyle-store/index.php");//redirecting to home page 


?>