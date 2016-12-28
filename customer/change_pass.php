
<h2 style="text-align:center">Change Password</h2>
<form action="" method="post">
	<table class="account">
		<tr>
			<td><input required placeholder="Current Password" type="password" class="account" name="current_pass"> </td>
		</tr>
		<tr>
			<td><input required placeholder="New Password" type="password" class="account" name="new_pass"> </td>
		</tr>
		<tr>
			<td><input required placeholder="New Password Again" type="password" class="account" name="new_pass_again"></td>
		</tr>
		<tr>
			<td><input type="submit" name="change_pass" class="account_button" value="Change Password"></td>
		</tr>
	</table>
	
</form>

<?php
include("../includes/db.php");
if (isset($_POST['change_pass'])) {

	$user = $_SESSION['customer_email'];
	$current_pass = $_POST['current_pass'];
	$new_pass = $_POST['new_pass'];
	$new_again = $_POST['new_pass_again'];

	$sel_pass = "SELECT * FROM customers WHERE customer_pass='$current_pass' AND customer_email='$user' ";
	$run_pass = mysqli_query($con, $sel_pass);
	$check_pass = mysqli_num_rows($run_pass);
	if ($check_pass==0) {
		echo "<script>alert('Your current password is wrong!')</script>";
		exit();
	}
	if ($new_pass!=$new_again) {
		echo "<script>alert('New passwords do no match!')</script>";
		exit();
	} else {
		$update_pass = "UPDATE customers SET customer_pass='$new_pass' WHERE customer_email='$user'";
		$run_update = mysqli_query($con, $update_pass);
		echo "<script>alert('Your pass was updated successfully!')</script>";
		echo "<script>window.open('my_account.php','_self');</script>";
	}
}

?>