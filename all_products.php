<!DOCTYPE>
<?php

include("functions/functions.php");
include("./templates/header.php");

?>

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
				
				<?php include("templates/sidebar.php"); ?>
			
				<div id="content_area">
					<?php cart(); ?>
					
					<div id="shopping_cart">
						<?php include("templates/status_bar.php") ?>
					</div>
				
					<div id="products_box">
					
					<?php 
					$get_pro = "SELECT * FROM products";
	
					$run_pro = mysqli_query($con, $get_pro);
	
					while($row_pro=mysqli_fetch_array($run_pro)) {
						$pro_id = $row_pro['product_id'];
						$pro_cat = $row_pro['product_cat'];
						$pro_brand = $row_pro['product_brand'];
						$pro_title = $row_pro['product_title'];
						$pro_price = $row_pro['product_price'];
						$pro_image = $row_pro['product_image'];
						$pro_desc = $row_pro['product_desc'];
						printThumbnail($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
					}
					?>
					
					</div>
					
				</div>
				
			</div>
			<!--End content_wrapper container-->
			
			<?php include("templates/footer.html") ?>
