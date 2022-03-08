<?php

	session_start();
	include('../../pages/views/websiteicon.php');
  if(!$_SESSION) {
    header("location:../index.php");
  }
  
  include('./views/header.php');

?>

<title>Add Product</title>
<link rel="stylesheet" type="text/css" href="../css/products.css">
<div class="container wrapper">

  <?php

    if(isset($_GET['success'])){

        if($_GET['success'] == 'T'){
          echo "<div class='container' id='hideMe'><div class='alert alert-success'>Product added successfully <a href='./getProdutsList.php'><strong>SHOW ALL PRODUCTS</strong></a></div></div>";}}
  ?>
  <div class="container addProductForm">
    <form method="post" action="../actions/addProduct.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="Product_name"><strong>Product name</strong></label>
    <input id="Product_name" type="text" name="name" required class="form-control" placeholder="Product_name">
  </div>
  <div class="form-group">
    <label for="Product_price"><strong>Product Price</strong></label>
    <input  id="Product_price" type="numbers" name="price" class="form-control" placeholder="Price" required>
  </div>
  <div class="form-group">
    <label for="Product_image">Picture</label>
    <input id="Product_image" type="file" name="image" class="form-control-file" placeholder="Picture" required>
    <small class="form-text text-muted">max-size:50kb</small>
  </div>
  
  <button type="submit" name="upload" class="btn btn-primary">Upload</button>
</form>
</div>
</div>