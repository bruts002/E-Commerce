<!DOCTYPE>

<?php

session_start();

if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You are not an admin!','_self');</script>";
} else {

include("../includes/db.php");
if (isset($_GET['edit_pro'])) {
	$get_id = $_GET['edit_pro'];
	$get_pro ="SELECT * FROM products WHERE product_id='$get_id'";
	$run_pro = mysqli_query($con, $get_pro);
	$row_pro=mysqli_fetch_array($run_pro);
	$pro_id = $row_pro['product_id'];
	$pro_title = $row_pro['product_title'];
	$pro_image = $row_pro['product_image'];
	$pro_price = $row_pro['product_price'];
	$pro_desc = $row_pro['product_desc'];
	$pro_keywords = $row_pro['product_keywords'];
	$pro_cat = $row_pro['product_cat'];
	$pro_brand = $row_pro['product_brand'];
}

?>
<html>
	<head>
		<title>Updating Product</title>
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>
	
<body bgcolor="skyblue">
	
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="795" border="2" bgcolor="#187eae">
		
			<tr align="center">
				<td colspan="7">
					<h2 align="center">Edit & Update Product</h2>
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="60" value="<?php echo "$pro_title"; ?>"/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
					<select name="product_cat">
						<?php
							$get_cats = "select * from categories";
							$run_cats = mysqli_query($con, $get_cats);
							while($row_cats=mysqli_fetch_array($run_cats)) {
								$cat_id = $row_cats['cat_id'];
								$cat_title = $row_cats['cat_title'];
								if ($cat_id == $pro_cat) {
									echo "<option selected value='$cat_id'>$cat_title</option>";
								} else {
									echo "<option value='$cat_id'>$cat_title</option>";
								}
							}
						?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Brand:</b></td>
				<td>
					<select name="product_brand">
						<?php
							$get_brands = "select * from brands";
							$run_brands = mysqli_query($con, $get_brands);
							while($row_brands=mysqli_fetch_array($run_brands)) {
								$brand_id = $row_brands['brand_id'];
								$brand_title = $row_brands['brand_title'];
								if ($brand_id == $pro_brand) {
									echo "<option selected value='$brand_id'>$brand_title</option>";
								} else {
									echo "<option value='$brand_id'>$brand_title</option>";
								}
							}
						?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Image:</b></td>
				<td><input type="file" name="product_image"/><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Price:</b></td>
				<td>
					<input type="text" value="<?php echo $pro_price; ?>" name="product_price"/>
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Description:</b></td>
				<td>
					<textarea name="product_desc" value="<?php echo $pro_desc; ?>" cols="1" rows="10" placeholder="Click here to type"></textarea>
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Keywords:</b></td>
				<td><input type="text" value="<?php echo $pro_keywords; ?>" name="product_keywords" size="50"/></td>
			</tr>
			
			<tr align="center">
				<td colspan="2"><input type="submit" name="update_product" value="Update Product Now"/></td>
			</tr>
		
		</table>
	
	</form>
	
	
	
</body>
</html>

<?php

	if(isset($_POST['update_product'])) {

		$update_id = $pro_id;
		//getting the text data from the fields
		$product_title     = $_POST['product_title'];
		$product_cat       = $_POST['product_cat'];
		$product_brand     = $_POST['product_brand'];
		$product_price     = $_POST['product_price'];
		$product_desc      = $_POST['product_desc'];
		$product_keywords  = $_POST['product_keywords'];
		
		//getting the image from the field
		$product_image      = $_FILES['product_image']['name'];
		$product_image_tmp  = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		$update_product = "UPDATE products SET product_title='$product_title',
							product_image='$product_image',
							product_cat='$product_cat',
							product_brand='$product_brand',
							product_title='$product_title',
							product_price='$product_price',
							product_desc='$product_desc',
							product_keywords='$product_keywords'
						   WHERE product_id='$update_id'";
	
		$update_pro = mysqli_query($con, $update_product);
		
		if($update_pro){
			echo "<script>alert('Product has been updated')</script>";
			echo "<script>window.open('index.php?view_products','_self')</script>";
		}
	}
}












?>