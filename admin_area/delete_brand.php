<?php

	session_start();

	if (!isset($_SESSION['user_email'])) {
	  echo "<script>window.open('login.php?not_admin=You are not an admin!','_self');</script>";
	} else {

		include("../includes/db.php");
		if (isset($_GET['delete_brand'])) {
			$delete_brand_id = $_GET['delete_brand'];
			$delete_brand_query = "DELETE FROM brands WHERE brand_id='$delete_brand_id' ";
			$run_delete_query = mysqli_query($con, $delete_brand_query);
			if ($run_delete_query) {
				echo "<script>alert('A brand has been deleted!')</script>";
				echo "<script>window.open('index.php?view_brands','_self');</script>";
			}
		}
	}



?>