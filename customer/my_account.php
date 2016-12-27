<!DOCTYPE>
<?php

session_start();
include("../functions/functions.php");
$dir_level = 1;
include("../templates/header.php");

?>

			<!--Begin header_wrapper container-->
			<div class="header_wrapper"> 
				<a href="../index.php"><img src="../images/Blue.jpg" /> </a>
			</div>
			<!--End head_wrapper container-->
			
			<?php include("../templates/menubar.php") ?>
			
			<!--Begin content_wrapper container-->
			<div class="content_wrapper">
				<?php
					if (!isset($_SESSION['customer_email'])) {
						$destination = "my_account.php";
						include("../customer_login.php");
						exit();
					}
					include("../templates/account_sidebar_right.php");
				?>
			
				<div id="content_area">
					<?php cart(); ?>

					<div id="products_box">
						<?php 
						if(!isset($_GET['my_orders']) && !isset($_GET['edit_account'])
						&& !isset($_GET['delete_account']) && !isset($_GET['change_pass']) ){
							echo "<h2 style='padding-top:20px;' >Welcome $c_name </h2><br/>";
							echo "<b>You can see your orders' progress by clicking this <a href='my_account.php?my_orders'>link</a></b>" ;
						}
						if (isset($_GET['edit_account'])) {
							include("edit_account.php");
						}
						if (isset($_GET['change_pass'])) {
							include("change_pass.php");
						}
						if (isset($_GET['delete_account'])) {
							include("delete_account.php");
						}
						?>
					</div>

				</div>
				
			</div>
			<!--End content_wrapper container-->
			
			<?php include("../templates/footer.html") ?>
