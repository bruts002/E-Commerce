<?php
include("includes/db.php");
?>

<div style="margin:auto auto;">
	<form method="post" action="">
		<table class="account">
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr align="center">
				<td><input class="account" required type="text" autofocus placeholder="Email" name="email"/></td>
			</tr>
			<tr align="center">
				<td><input class="account" required type="password" placeholder="Password" name="pass"/></td>
			</tr>
			<tr>
				<td align="right"> <a href="checkout.php?forgot_pass" style="color:#808080;text-decoration:none;">Forgot</a></td>
			</tr>
			<tr>
				<td align="center"><input class="account_button" type="submit" name="login" value="Login"/></td>
			</tr>
			<tr>
				<td>Not a member?<a href="../customer_register.php"><b> Sign up</b></a></td>
			</tr>
		</table>
	</form>

	<?php
	if (isset($_POST['login'])){
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];
		$sel_c = "SELECT * FROM customers WHERE customer_pass='$c_pass' AND customer_email='$c_email'";
		$run_c = mysqli_query($con, $sel_c);
		$check_customer = mysqli_num_rows($run_c);

		if ($check_customer==0) {
			echo "<script>alert('Password or email is incorrect!')</script>";
		} else {
			$ip = getIp();

			$sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";
			$run_cart = mysqli_query($con, $sel_cart);
			$check_cart = mysqli_num_rows($run_cart);

			$_SESSION['customer_email'] = $c_email;

			if (isset($destination)) {
				echo "<script>window.open('$destination', '_self')</script>";
			}
			else if ($check_customer>0 && $check_cart==0) {
				echo "<script>window.open('customer/my_account.php', '_self')</script>";
			} else {
				echo "<script>window.open('checkout.php', '_self')</script>";
			}

		}

	}
	?>

</div>