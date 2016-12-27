<?php

session_start();

if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You are not an admin!','_self');</script>";
} else {

?>
<!DOCTYPE>

<html>
	<head>
		<title>Welcome to Admin Panel</title>
		<link media="all" rel="stylesheet" href="styles/style.css">
	</head>

	<body>
		<div class="main_wrapper">
			<div id="header"></div>

			<div id="right">
				<h2>Manage Content</h2>
				<a href="index.php?insert_product">Insert New Product</a>
				<a href="index.php?view_products">View All Products</a>
				<a href="index.php?insert_cat">Insert New Category</a>
				<a href="index.php?view_cats">View All Categories</a>
				<a href="index.php?insert_brand">Insert New Brand</a>
				<a href="index.php?view_brands">View All Brands</a>
				<a href="index.php?view_customers">View Customers</a>
				<a href="index.php?view_orders">View Orders</a>
				<a href="index.php?view_payments">View Payments</a>
				<a href="logout.php">Logout</a>
			</div>


			<div id="left">
				
				<?php 
				if(isset($_GET['insert_product'])) {
					include("./templates/insert_product.php");
				} else if (isset($_GET['view_products'])) {
					include("./templates/view_products.php");
				} else if (isset($_GET['edit_pro'])) {
					include("./templates/edit_pro.php");
				} else if (isset($_GET['insert_cat'])) {
					include("./templates/insert_cat.php");
				} else if (isset($_GET['view_cats'])) {
					include("./templates/view_cats.php");
				} else if (isset($_GET['edit_cat'])) {
					include("./templates/edit_cat.php");
				} else if (isset($_GET['insert_brand'])) {
					include("./templates/insert_brand.php");
				} else if (isset($_GET['view_brands'])) {
					include("./templates/view_brands.php");
				} else if (isset($_GET['edit_brand'])) {
					include("./templates/edit_brand.php");
				} else if (isset($_GET['view_customers'])) {
					include("./templates/view_customers.php");
				} else {
					echo "<h2 style='text-align:center;'>Welcome to Admin Area!</h2>";
				}
				?>
			</div>
		</div>
	</body>


</html>
<?php } ?>