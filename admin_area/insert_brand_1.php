<!DOCTYPE>

<?php

include("../includes/db.php");

?>
<html>
	<head>
		<title>Inserting New Brand</title>
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>
	
<body bgcolor="gray">
	
	<form action="insert_brand.php" method="post" enctype="multipart/form-data">
		<table align="center" width="700" border="2" bgcolor="gray">
		
			<tr align="center">
				<td colspan="7">
					<h2 align="center">Insert New Brand Here</h2>
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Brand Title:</b></td>
				<td> <input type="text" name="new_brand" /> </td>
			</tr>
			
			<tr>
				<td align="right"><b>Data Type:</b></td>
				<td> <input type="text" name="data_type" /> </td>
			</tr>
			
			<tr align="center">
				<td colspan="2"><input type="submit" name="insert_post" value="Insert Brand Now"/></td>
			</tr>
		
		</table>
	
	</form>
	
</body>
</html>

<?php

	if(isset($_POST['insert_post'])) {
		//getting the text data from the fields
		$product_brand = $_POST['new_brand'];
		$data_type     = $_POST['data_type'];

		$insert_brand = "ALTER TABLE `productsone` ADD `$product_brand` $data_type NOT NULL" ;
	
		$insert_bra = mysqli_query($con, $insert_brand);
		
		if($insert_bra){
		echo "<script>alert('Brand has been inserted')</script>";
		echo "<script>window.open('insert_brand.php','_self')</script>";
		}
		}












?>