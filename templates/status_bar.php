<div id="shopping_cart">
<span>
	<?php
		if (isset($_SESSION) && isset($_SESSION['customer_email'])) {
			echo "Welcome " . $_SESSION['customer_email'] . "!";
		} else {
			echo "Welcome Guest!";
		}
	?>
	<b>Shopping Cart-</b>
	Total Items: <?php total_items();?>
	Total Price: <?php total_price(); ?>

	<?php
		if(isset($status_cart)) {
			echo "<a href='index.php'>Back to Shop</a>";
		} else {
			echo "<a href='cart.php'>Go to Cart </a>";
		}
		if (!isset($_SESSION['customer_email'])) {
			echo "<a href='checkout.php'>Login</a>";
		} else {
			echo "<a href='logout.php'>Logout</a>";
		}
	?>

</span>
</div>
