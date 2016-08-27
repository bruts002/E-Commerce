<!DOCTYPE>
<?php

session_start();
include("functions/functions.php");

?>
<html>
	<head>
		<title>eCommerce</title>
		
		
	<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>
	
<body>
	
	<!--Begin main_wrapper container-->
	<div class="main_wrapper">
	
			<!--Begin header_wrapper container-->
			<div class="header_wrapper"> 
				<img src="images/Blue.jpg" />
			</div>
			<!--End head_wrapper container-->
			
			<!--Navigation Bar starts-->
			<div class="menubar">
			
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="all_products.php">All Products</a></li>
					<li><a href="customer/my_account.php">My Account</a></li>
					<li><a href="cart.php">My Cart</a></li>
					<li><a href="#">Support</a></li>
				
				</ul>
				
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text"   name="user_query" placeholder="Search a Product" / >
						<input type="submit" name="search"     value="Search" />
					</form>
				
				</div>
			
			</div>
			<!--Navigation Bar Ends-->
			
			<!--Begin content_wrapper container-->
			<div class="content_wrapper">
				
				<?php include("templates/sidebar.php"); ?>
			
				<div id="content_area">
					<?php cart(); ?>
					
					<div id="shopping_cart">
						<?php include("templates/status_bar.php") ?>
					</div>
				
<?php
	if(isset($_GET['pro_id'])){

	$product_id = $_GET['pro_id'];
	
	$get_pro = "select * from products where product_id='$product_id'";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro)) {
	
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		$pro_desc  = $row_pro['product_desc'];
		echo "
			<div id='single_product'>
			
				<h3>$pro_title</h3>
				
				<img src='admin_area/product_images/$pro_image' width='400' height='300' />
				
				<p><b>$ $pro_price</b></p>
				
				<p>$pro_desc </p>
				
				<a href='index.php' style='float:left;'>Go Back</a>
				
				<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
			</div>
		";
	}
	}
		?>					
					
				</div>
				
			</div>
			<!--End content_wrapper container-->
			
			<?php include("templates/footer.html") ?>
	
	</div>
	<!--End main_wrapper container-->


</body>
</html>