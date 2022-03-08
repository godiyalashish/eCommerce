<?php


function number(){ 

	include('../../connection/connection.php');

	$query = "SELECT COUNT(id) FROM messages;";

			$result = mysqli_query($link,$query); //running above query

			$row = mysqli_fetch_array($result); //fetching response from DB

    echo "$row[0]"; 

}
?>