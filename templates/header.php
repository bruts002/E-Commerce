<?php
$level = "";
if (isset($dir_level)) {
	while ($dir_level > 0) {
		$level = $level . "../";
		$dir_level = $dir_level - 1;
	}
} else {
	$level = "./";
}
?>

<html>
	<head>
		<title>eCommerce</title>
		<link rel="stylesheet" href="<?php echo $level ?>styles/style.css" media="all" />
	</head>
	<body>
		<!--Begin main_wrapper container-->
		<div class="main_wrapper">
