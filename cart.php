<?php

session_start();
include("functions/functions.php");
include("./templates/header.php");

?>

			<!--Begin header_wrapper container-->
			<div class="header_wrapper"> 
				<a href="index.php"><img src="images/blue.jpg" /> </a>
			</div>
			<!--End head_wrapper container-->
			
			<?php include("templates/menubar.php") ?>
			
			<!--Begin content_wrapper container-->
			<div class="content_wrapper">
				
				<?php include("templates/sidebar.php"); ?>
			
				<div id="content_area">
					<?php cart(); ?>
					
					<div id="shopping_cart">
						<?php
							$status_cart = true;
							include("templates/status_bar.php")
						?>
					</div>
					
					<div id="products_box">
						<form action="" method="post" enctype="multipart/form-data">
						
							<table class="cart_table" >
								
								<tr align="center">
									<td colspan="5" align="center"><h2>Update your cart or checkout</h2></td>
								</tr>
						
								<tr align="center">
									<th>Remove</th>
									<th>Product(s)</th>
									<th>Quantity</th>
									<th>Total Price</th>
								</tr>
								
								<?php
									$total = 0;
									global $con;
									$ip = getIp();
									$sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";
									$run_price = mysqli_query($con, $sel_price);
									while($p_price=mysqli_fetch_array($run_price)) {
										$pro_id = $p_price['p_id'];
										$pro_qty = $p_price['qty'];
										$pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";
										$run_pro_price = mysqli_query($con, $pro_price);
										while ($pp_price = mysqli_fetch_array($run_pro_price)) {
											$product_price = array($pp_price['product_price']);
											$product_title = $pp_price['product_title'];
											$product_image = $pp_price['product_image'];
											$single_price = $pp_price['product_price'];
								?>
								
								<tr align="center">
									<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
									<td><?php echo $product_title; ?><br>
										<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60" />
									</td>
									<td><input type="text" size="4" name="qty" value="<?php echo $pro_qty ?>" /></td>

									<?php
									if(isset($_POST['update_cart'])) {
										$ip = getIp();
										$qty = $_POST['qty'];
										$update_qty = "UPDATE cart SET qty=$qty WHERE p_id = $pro_id AND ip_add = $ip";
										$run_qty = mysqli_query($con, $update_qty);
										$_SESSION['qty']=$qty;
										$total = $total * $qty;
									}
									?>

									<td><?php echo "$" . $single_price; ?> </td>
								</tr>
								
								<!-- Close while loops! -->
								<?php }} ?>
								
								<tr align="right">
									<td colspan="4"> <b>Sub Total:</b><td>
									<td colspan="4"> <?php echo total_price() ?></td>
								
								</tr>

								<tr align="center">
									<td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
									<td><input type="submit" name="continue" value="Continue Shopping" /></td>
									<td><button><a href="checkout.php" style="text-decoration:none; color:black;" >Checkout</a></button></td>
								</tr>
								<tr><td>&nbsp;</td></tr>
								
							</table>
							
						</form>

				<?php
				function updatecart() {
					global $con;
					$ip = getIp();
					if(isset($_POST['update_cart'])) {
						foreach($_POST['remove'] as $remove_id) {
							$delete_product = "DELETE FROM cart WHERE p_id='$remove_id' AND ip_add='$ip' ";
							$run_delete = mysqli_query($con, $delete_product);
							if ($run_delete) {
								echo "<script>window.open('cart.php','_self')</script>";
							}
						}
					}

					if(isset($_POST['continue'])) {
						echo "<script>window.open('index.php','_self')</script>";
					}
				}
				echo @$up_cart = updatecart();

				?>
					
					</div>
				</div>
				
			</div>
			<!--End content_wrapper container-->
			
			
			<?php include("templates/footer.html") ?>
