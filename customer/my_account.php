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
				?>
				<div id="sidebar_right" >
				
					<div id="sidebar_right_title">My Account</div>
					
					<ul id="cats_right">
						<?php
						$user = $_SESSION['customer_email'];
						$get_img = "SELECT * FROM customers WHERE customer_email='$user'";
						$run_img = mysqli_query($con, $get_img);
						$row_img = mysqli_fetch_array($run_img);
						$c_image = $row_img['customer_image'];
						$c_name = $row_img['customer_name'];
						echo "<p style='text-align:center;' ><img src='customer_images/$c_image' width='150' height='150' /></p>";
						?>
						<li><a href="my_account.php?my_orders">My Orders</a></li>
						<li><a href="my_account.php?edit_account">Edit Account</a></li>
						<li><a href="my_account.php?change_pass">Change Password</a></li>
						<li><a href="my_account.php?delete_account">Delete Account</a></li>
						<li><a href="../logout.php">Logout</a></li>
					</ul>
					
				</div>
			
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
