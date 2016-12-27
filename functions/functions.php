<?php

$sql_server = "localhost";
$sql_user = "root";
$sql_pass = "";
$sql_dbname = "ecommerce";
$con = mysqli_connect($sql_server, $sql_user, $sql_pass, $sql_dbname);

//error message if no connection
if (mysqli_connect_errno()) {
	echo "The connection was not established: " . mysqli_connect_error();
	exit(0);
}
	
//getting the user IP address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//creating the shopping cart
function cart() {

	if (isset($_GET['add_cart'])) {
		global $con;
		$ip = getIP();
		$pro_id = $_GET['add_cart'];
		
		$check_pro = "SELECT * FROM cart WHERE ip_add='$ip' AND p_id='$pro_id'";
		$run_check = mysqli_query($con, $check_pro);
		
		if(mysqli_num_rows($run_check)>0) {
			echo "";
		}
		else {
			$insert_pro = "INSERT INTO cart (p_id,ip_add,qty) VALUES ('$pro_id','$ip',1)";
			$run_pro = mysqli_query($con, $insert_pro);
			echo "<script>window.open('index.php','_self')</script>";
		}
	}

}

//getting the total added items
function total_items(){
	
	global $con;
	$ip = getIp();
	$get_items = "SELECT * FROM cart WHERE ip_add='$ip'";
	$run_items = mysqli_query($con, $get_items);
	$count_items = mysqli_num_rows($run_items);
	
	echo $count_items;
}

//getting the total price of the items in the cart
function total_price() {
		
		global $con;

		$total = 0;
		$ip = getIp();
		
		$sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";
		$run_price = mysqli_query($con, $sel_price);
		while($p_price=mysqli_fetch_array($run_price)) {
			
			$pro_id = $p_price['p_id'];
			$pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";
			$run_pro_price = mysqli_query($con, $pro_price);
			while ($pp_price = mysqli_fetch_array($run_pro_price)) {
				$product_price = array($pp_price['product_price']);
				$values = array_sum($product_price) * $p_price['qty'];
				$total += $values;
			}
		}
		
		echo "$" . $total;
}
	
//getting the categories
function getCats(){

	global $con;

	$get_cats = "SELECT * FROM categories";
	$run_cats = mysqli_query($con, $get_cats);
	while($row_cats=mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}

//getting the brands
function getBrands(){

	global $con;

	$get_brands = "SELECT * FROM brands";
	$run_brands = mysqli_query($con, $get_brands);
	while($row_brands=mysqli_fetch_array($run_brands)) {
		$brand_id = $row_brands['brand_id'];
		$brand_title = $row_brands['brand_title'];
		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}

}

//gets six random products, used for index
function getPro(){
	global $con;

	$get_pro = "SELECT * FROM products ORDER BY RAND() LIMIT 0,6";
	$run_pro = mysqli_query($con, $get_pro);
	while($row_pro=mysqli_fetch_array($run_pro)) {
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		$pro_desc = $row_pro['product_desc'];
		printThumbnail($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
	}
}

function printThumbnail($title, $id, $image, $price, $desc) {
	echo "
		<div class='single_product'>
			<h3>$title</h3>
			<div class='panel panel-default'>
				<div class='box-container'>
					<div class='front'>
						<a href='details.php?pro_id=$id'>
							<img src='admin_area/product_images/$image' />
						</a>
					</div>
					<div class='back'>
						$desc
					</div>
				</div>
			</div>
			<p><b>Price: $$price</b></p>
			<a href='details.php?pro_id=$id' style='float:left;'>Details</a>
			<a href='index.php?add_cart=$id'><button style='float:right'>Add to Cart</button></a>
		</div>
	";
}

//brings all products of a specific category
function getCatPro(){

	global $con;

	$cat_id = $_GET['cat'];
	$get_cat_pro = "SELECT * FROM products WHERE product_cat='$cat_id'";
	$run_cat_pro = mysqli_query($con, $get_cat_pro);
	$count_cats = mysqli_num_rows($run_cat_pro);
	if($count_cats==0) {
		echo "<h2 style='padding:20px'>No products found in this category!</h2>";
	}

	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)) {
		$pro_id = $row_cat_pro['product_id'];
		$pro_cat = $row_cat_pro['product_cat'];
		$pro_brand = $row_cat_pro['product_brand'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image = $row_cat_pro['product_image'];
		$pro_desc = $row_cat_pro['product_desc'];
		printThumbnail($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
	}
}
	
	

//gets all products of a specific brand
function getBrandPro(){

	global $con;

	$brand_id = $_GET['brand'];
	$get_brand_pro = "SELECT * FROM products WHERE product_brand='$brand_id'";
	$run_brand_pro = mysqli_query($con, $get_brand_pro);
	$count_brands = mysqli_num_rows($run_brand_pro);
	if($count_brands==0) {
		echo "<h2 style='padding:20px'>No products where found associated with this brand!</h2>";
	}
	while($row_brand_pro=mysqli_fetch_array($run_brand_pro)) {
		$pro_id = $row_brand_pro['product_id'];
		$pro_cat = $row_brand_pro['product_cat'];
		$pro_brand = $row_brand_pro['product_brand'];
		$pro_title = $row_brand_pro['product_title'];
		$pro_price = $row_brand_pro['product_price'];
		$pro_image = $row_brand_pro['product_image'];
		$pro_desc = $row_brand_pro['product_desc'];
		printThumbnail($pro_title, $pro_id, $pro_image, $pro_price, $pro_desc);
	}
}

function getPath($level) {
	$path = "";
	if ($level > 0) {
		while ($level > 0) {
			$path = $path . "../";
			$level = $level - 1;
		}
	} else {
		$path = "./";
	}
	return $path;
}

?>
