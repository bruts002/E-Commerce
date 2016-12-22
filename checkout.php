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
			
			<div>
			
				<?php

				if (!isset($_SESSION['customer_email'])) {
					include("customer_login.php");
				} else {
					include("payment.php");
				}

				?>
				
			</div>
				
			<?php include("templates/footer.html"); ?>
