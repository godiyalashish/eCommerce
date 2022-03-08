<!-- Header -->

<?php

	session_start();

	include('./views/websiteicon.php');

?>

<title>Start shopping - Shirts,watches,jackets,shoes...</title>
<link rel="stylesheet" type="text/css" href="/Lifestyle-store/css/products.css">

<?php


	include('./views/header.php');

	include('../connection/connection.php');

?>

<!-- Header-ends -->

<!-- content -->

<div class="container">
<div class="container product-header-label col-xs-12">
 
  <h1>Welcome to our Lifestyle store!</h1>
  <p>We have the best cameras, watches and shirts for you.No need to hunt around,we have all in one place.
  </p>

</div>

<div class="row my-5">

<?php

//selecting everthing from products table

	$query = "SELECT * FROM `products`";

	$result = mysqli_query($link,$query); //fetching array from products table in DB

	while($row = mysqli_fetch_assoc($result)){ 

		$prod_name = $row['prod_name'];

		$prod_price = $row['prod_price'];

		$prod_id = $row['id'];

		$img = $row['img'];

		echo "<div class='col-md-3 col-sm-6 wrapper'><div class='container product'>"; //products container

      echo'<img src="data:image/jpeg;base64,'.base64_encode( $img ).'" alt="product" class="img-thumbnail" id="thumb"/>'; //converting blob returned by DB to image
      echo" <div class='caption'>
        <h3>$prod_name</h3>
        <p>Price: Rs. $prod_price</p>
        <a class='btn btn-block btn-primary' href='/lifestyle-store/pages/cart.php?name=$prod_name&price=$prod_price&prod_id=$prod_id'>Add to cart</a>
      </div> </div> 
    </div>"; //product ends
	}


	$query = "SELECT prod_name FROM `products`";
	$result = mysqli_query($link,$query);
	$row = mysqli_fetch_assoc($result);
	print_r($row); 

?>

</div>
</div>



<!-- Footer -->




<?php

	include('./views/footer.php');


?>


<!-- Footer ends -->