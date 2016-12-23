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
					<?php
						cart();
						include("templates/status_bar.php");
					?>
					
					<div id="products_box">
						<?php 
							if(isset($_GET['brand'])) {
								getBrandPro();
							} else if (isset($_GET['cat'])) {
								getCatPro(); 
							} else {
								getPro();
							}
						?>
					</div>
					
				</div>
				
			</div>
			<!--End content_wrapper container-->
			
			<?php include("templates/footer.html") ?>
