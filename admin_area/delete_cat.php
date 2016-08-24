<?php

	session_start();

	if (!isset($_SESSION['user_email'])) {
	  echo "<script>window.open('login.php?not_admin=You are not an admin!','_self');</script>";
	} else {

		include("../includes/db.php");
		if (isset($_GET['delete_cat'])) {
			$delete_cat_id = $_GET['delete_cat'];
			$delete_cat_query = "DELETE FROM categories WHERE cat_id='$delete_cat_id' ";
			$run_delete_query = mysqli_query($con, $delete_cat_query);
			if ($run_delete_query) {
				echo "<script>alert('A category has been deleted!')</script>";
				echo "<script>window.open('index.php?view_cats','_self');</script>";
			}
		}
	}



?>