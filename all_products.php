<!DOCTYPE>
<?php

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
				<a href="index.php"><img src="images/Blue.jpg" /> </a>
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
				<div id="sidebar" >
				
					<div id="sidebar_title">Categories</div>
					
					<ul id="cats">
						<?php getCats(); ?>
					</ul>
					
					<div id="sidebar_title">Brands</div>
					
					<ul id="cats">
						<?php getBrands(); ?>
					</ul>
					
				</div>
			
				<div id="content_area">
					<?php cart(); ?>
					
					<div id="shopping_cart">
						<?php include("status_bar.php") ?>
					</div>
				
					<div id="products_box">
					
					<?php 
					$get_pro = "select * from products";
	
					$run_pro = mysqli_query($con, $get_pro);
	
					while($row_pro=mysqli_fetch_array($run_pro)) {
	
					$pro_id = $row_pro['product_id'];
					$pro_cat = $row_pro['product_cat'];
					$pro_brand = $row_pro['product_brand'];
					$pro_title = $row_pro['product_title'];
					$pro_price = $row_pro['product_price'];
					$pro_image = $row_pro['product_image'];
	
					echo "
					<div id='single_product'>
			
					<h3>$pro_title</h3>
					
					<a href='details.php?pro_id=$pro_id'> <img src='admin_area/product_images/$pro_image' width='180' height='180' /> </a>
					
					<p><b>$ $pro_price</b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
					
				</div>
				";
				}
				?>
					
					</div>
					
				</div>
				
			</div>
			<!--End content_wrapper container-->
			
			<div id="footer" >
			
			<h2 style="text-align:center; padding-top:30px;">&copy; 2016 by Michael Brutskiy</h2>
			
			</div>
		
	
	
	
	
	</div>
	<!--End main_wrapper container-->


</body>
</html>