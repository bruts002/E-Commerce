<h2 style="text-align:center;">Do you really want to DELETE your account?</h2>
<br/>
<form action="" method="post">
	<input type="submit" name="yes" value="Yes" />
	<input type="submit" name="no"  value="No!" />
</form>

<?php
include("../includes/db.php");

$user = $_SESSION['customer_email'];
if (isset($_POST['yes'])) {
	$delete_customer = "DELETE FROM customers WHERE customer_email='$user'";
	$run_customer = mysqli_query($con,$delete_customer);
	echo "<script>alert('We are really sorry, your account has been deleted!')</script>";
	echo "<script>window.open('../logout.php', '_self')</script>";
}
else if (isset($_POST['no'])) {
	echo "<script>alert('Wise choice!')</script>";
	echo "<script>window.open('../index.php', '_self')</script>";
}

?>