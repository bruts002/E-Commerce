<!DOCTYPE>
<?php

session_start();
include("functions/functions.php");
include("./templates/header.php");

?>

			<!--Begin header_wrapper container-->
			<div class="header_wrapper"> 
				<a href="index.php"><img src="images/Blue.jpg" /> </a>
			</div>
			<!--End head_wrapper container-->
			
			<?php include("templates/menubar.html") ?>
			
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
					
					if(isset($_GET['search'])){
					
					$search_query = $_GET['user_query'];
					
					$get_pro = "select * from products where product_keywords like '%$search_query%' ";
	
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
					
					<img src='admin_area/product_images/$pro_image' width='180' height='180' />
					
					<p><b>$ $pro_price</b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
					
				</div>
				";
				}
				}
				
				?>
					
					</div>
					
				</div>
				
			</div>
			<!--End content_wrapper container-->
			
			<?php include("templates/footer.html") ?>
