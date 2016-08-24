<?php

	session_start();

	if (!isset($_SESSION['user_email'])) {
	  echo "<script>window.open('login.php?not_admin=You are not an admin!','_self');</script>";
	} else {

		include("../includes/db.php");
		if (isset($_GET['delete_c'])) {
			$delete_customer_id = $_GET['delete_c'];
			$delete_customer_query = "DELETE FROM customers WHERE customer_id='$delete_customer_id' ";
			$run_delete_query = mysqli_query($con, $delete_customer_query);
			if ($run_delete_query) {
				echo "<script>alert('A customer has been deleted!')</script>";
				echo "<script>window.open('index.php?view_customers','_self');</script>";
			}
		}
	}



?>