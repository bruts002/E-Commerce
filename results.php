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
			
			<?php include("templates/menubar.php") ?>
			
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
							$pro_desc = $row_pro['product_desc'];
							printThumbnail($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
						}
					}
					?>
					
					</div>
					
				</div>
				
			</div>
			<!--End content_wrapper container-->
			
			<?php include("templates/footer.html") ?>
