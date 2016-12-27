<?php

session_start();

if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You are not an admin!','_self');</script>";
} else {


	include("../includes/db.php");
	if (isset($_GET['delete_pro'])) {
		$delete_pro_id = $_GET['delete_pro'];
		$delete_pro_query = "DELETE FROM products WHERE product_id=$delete_pro_id ";
		$run_delete_query = mysqli_query($con, $delete_pro_query);
		if ($run_delete_query) {
			echo "<script>alert('A product has been deleted!')</script>";
			echo "<script>window.open('index.php?view_products','_self');</script>";
		}
	}
}



?>