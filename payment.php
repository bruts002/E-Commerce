<div>
<?php

include("includes/db.php");

$total = 0;
global $con;
$ip = getIp();

$sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";
$run_price = mysqli_query($con, $sel_price);
while($p_price=mysqli_fetch_array($run_price)) {
	$pro_id = $p_price['p_id'];
	$pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";
	$run_pro_price = mysqli_query($con, $pro_price);
	while ($pp_price = mysqli_fetch_array($run_pro_price)) {
		$product_price = array($pp_price['product_price']);
		$product_name = array($pp_price['product_title']);
		$values = array_sum($product_price) * $p_price['qty'];
		$total += $values;
	}
}




?>
	<h2 align="center">Pay now with PayPal</h2>

	<form align="center" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
		<!--Identify your business so that you can collect the payments. -->
		<input type="hidden" name="business" value="busyness@brutskiy.com">

		<!-- Specify a Buy Now button -->
		<input type="hidden" name="cmd" value="_xclick">

		<!-- Specify details about the item that buyers will purchase. -->
		<input type="hidden" name="item_name" value="<?php echo $product_name ?>">
		<input type="hidden" name="account" value="<?php echo $total ?>">
		<input type="hidden" name="currency_code" value="USD">

		<input type="hidden" name="return" value="http://electricecommerce.netau.net/paypal_success.php">
		<input type="hidden" name="cancel_return" value="http://electricecommerce.netau.net/paypal_cancel.php">

		<!-- Display the payment button. -->
		<input type="image" name="submit" border="0"
			src="images/paypal.gif"
			alt="PayPal - The safer, easier way to pay online">
		<img alt="" border="0" width="1" height="1"
			src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
	</form>

</div>