
<h2 style="text-align:center">Change Password</h2>
<form action="" method="post">
	<b>Password </b><input required type="password" name="current_pass"> <br/>
	<b>New Password </b><input required type="password" name="new_pass"> <br/>
	<b>New Password Again </b><input required type="password" name="new_pass_again"> <br/>
	<input type="submit" name="change_pass" value="Change Password">
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