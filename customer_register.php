<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
include("templates/header.php");

?>
	
			<!--Begin header_wrapper container-->
			<div class="header_wrapper"> 
				<a href="index.php"><img src="images/Blue.jpg" /> </a>
			</div>
			<!--End head_wrapper container-->
			
			<?php include("templates/menubar.php") ?>
			
			<!--Begin content_wrapper container-->
			<div class="content_wrapper">
			
				<form action="customer_register.php" method="post" enctype="multipart/form-data">
					<table id="account">
	

						<tr>
							<td><input placeholder="Name" autofocus class="account" required type="text" name="c_name" /></td>
						</tr>
						<tr>
							<td><input placeholder="Email" class="account" required type="email" name="c_email" /></td>
						</tr>
						<tr>
							<td><input placeholder="Password" class="account" required type="password" name="c_pass" /></td>
						</tr>
						<tr>
							<td><input class="account" required type="file" name="c_image" /></td>
						</tr>
						<tr>
							<td>
								<select class="account" name="c_country">
									<option>United States</option>
									<option>Afghanistan</option>
									<option>India</option>
									<option>Japan</option>
									<option>Pakistan</option>
									<option>Israel</option>
									<option>Nepal</option>
									<option>United Arab Emirates</option>
									<option>United Kingdom</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><input placeholder="City" class="account" required type="text" name="c_city" /></td>
						</tr>
						<tr>
							<td><input placeholder="Contact" class="account" required type="text" name="c_contact" /></td>
						</tr>
						<tr>
							<td><input placeholder="Address" class="account" required type="text" name="c_address" /></td>
						</tr>
						<tr align="center">
							<td><input id="account_button" type="submit" name="register" value="Create Account" /></td>
						</tr>
						<tr>
							<td>Already a member? <a href="checkout.php"><b>Login</b></a></td>
						</tr>

					</table>
				</form>
				
			</div>
			<!--End content_wrapper container-->
			

<?php
	include('templates/footer.html');
	if (isset($_POST['register'])) {
		$ip = getIp();

		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];

		move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image" );

		$insert_c = "INSERT INTO customers (customer_ip, customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) VALUES ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image') ";
		$run_c = mysqli_query($con, $insert_c);
		$sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";
		$run_cart = mysqli_query($con, $sel_cart);
		$check_cart = mysqli_num_rows($run_cart);
		if ($check_cart == 0) {
			$_SESSION['customer_email'] = $c_email;
			echo "<script>alert('Registration successful!')</script>";
			echo "<script>window.open('customer/my_account.php', '_self')</script>";
		} else {
			$_SESSION['customer_email'] = $c_email;
			echo "<script>alert('Registration successful!')</script>";
			echo "<script>window.open('checkout.php', '_self')</script>";
		}
	}
?>