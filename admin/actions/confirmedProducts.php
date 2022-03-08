<?php

	function getConfirmedProducts(){

		include('../../connection/connection.php');
		$query = "SELECT users.name, confirmed_orders.prod_name, confirmed_orders.prod_price, confirmed_orders.date FROM confirmed_orders JOIN users ON confirmed_orders.user_id=users.id";

			$result = mysqli_query($link,$query); //running above query

			$row = mysqli_fetch_array($result); //fetching response from DB

			$i = 0;

				while($row = mysqli_fetch_assoc($result)){
		$i++;
		$prod_price = $row['prod_price'];
		$prod_name = $row['prod_name'];
		$user_name = $row['name'];
		$date = $row['date'];
		$date = new DateTime($date);
		echo "<ol class='list-group list-group-numbered'>";
            
              echo "<li class='list-group-item d-flex justify-content-between align-items-start'>";
                echo "<div class='ms-2 me-auto'>";
                 echo "<div class='fw-bold name'>$i $prod_name</div>";
                 	echo "<p>Bought by: $user_name</p>";
                 	echo "<p>Product price: $prod_price</p>";
                 	echo "<p>Date: "; echo $date->format('Y-m-d');echo"</p>";
                echo "</div>";
          echo "</ol>";
}

	}
?>