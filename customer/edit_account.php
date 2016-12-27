<?php
	include("../includes/db.php");
	$user = $_SESSION['customer_email'];
	$get_customer = "SELECT * FROM customers WHERE customer_email='$user'";
	$run_customer = mysqli_query($con, $get_customer);
	$row_customer = mysqli_fetch_array($run_customer);

	$c_id = $row_customer['customer_id'];
	$name = $row_customer['customer_name'];
	$email = $row_customer['customer_email'];
	$pass = $row_customer['customer_pass'];
	$image = $row_customer['customer_image'];
	$country = $row_customer['customer_country'];
	$city = $row_customer['customer_city'];
	$contact = $row_customer['customer_contact'];
	$address = $row_customer['customer_address'];
	$contact = $row_customer['customer_contact'];
?>

<form action="" method="post" enctype="multipart/form-data">
	<table width="350" style="margin:20px auto; border: 1px solid gray; padding:20px; box-shadow: 0 0px 1px 0;" bgcolor="white">


		<tr>
			<td><input placeholder="Name" value="<?php echo $name ?>" autofocus colspan="2" align="center" class="account" required type="text" name="c_name" /></td>
		</tr>
		<tr>
			<td><input placeholder="Email" value="<?php echo $email ?>" class="account" required type="email" name="c_email" /></td>
		</tr>
		<tr>
			<td><input value="<?php echo $name ?>" class="account" type="file" name="c_image" /></td>
			<td><img src="customer_images/<?php echo $image ?>" width="50" height="50"></td>
		</tr>
		<tr>
			<td>
				<select class="account" name="c_country" disabled>
					<option><?php echo $country ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td><input placeholder="City" value="<?php echo $city ?>" class="account" required type="text" name="c_city" /></td>
						</tr>
						<tr>
							<td><input placeholder="Contact" value="<?php echo $contact ?>" class="account" required type="text" name="c_contact" /></td>
						</tr>
						<tr>
							<td><input placeholder="Address" value="<?php echo $address?>" class="account" required type="text" name="c_address" /></td>
						</tr>
						<tr align="center">
							<td><input class="account_button" type="submit" name="register" value="Update Account" /></td>
						</tr>

					</table>
				</form>

<?php
	if (isset($_POST['register'])) {
		$ip = getIp();

		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];

		move_uploaded_file($c_image_tmp, "customer_images/$c_image");

		$update_c = "UPDATE customers SET
			customer_name='$c_name',
			customer_email='$c_email',
			customer_city='$c_city',
			customer_contact='$c_contact',
			customer_address='$c_address',
			customer_image='$c_image'
			WHERE customer_id=$c_id";

		$run_update = mysqli_query($con, $update_c);
		if ($run_update) {
			echo "<script>alert('Update successful!');</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
		}
	}
?>