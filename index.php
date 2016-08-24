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
					
						<?php getPro(); getCatPro(); getBrandPro(); ?>
					
					</div>
					
				</div>
				
			</div>
			<!--End content_wrapper container-->
			
			<div id="footer">
			
			<h2 style="text-align:center; padding-top:30px;">&copy; 2016 by Michael Brutskiy</h2>
			
			</div>
		
	
	
	
	
	</div>
	<!--End main_wrapper container-->


</body>
</html>