<?php
$level = getPath(isset($dir_level) ? $dir_level : 0);
?>

<!--Navigation Bar starts-->
<div class="menubar">

    <ul class="menu">
        <li><a href="<?php echo $level ?>index.php">Home</a></li>
        <li><a href="<?php echo $level ?>all_products.php">All Products</a></li>
        <li><a href="<?php echo $level ?>customer/my_account.php">My Account</a></li>
        <li><a href="<?php echo $level ?>cart.php">My Cart</a></li>
        <li><a href="#">Support</a></li>
    
    </ul>
    
    <div class="form">
        <form method="get" action="<?php echo $level ?>results.php" enctype="multipart/form-data">
            <input type="text"   name="user_query" placeholder="Search a Product" / >
            <input type="submit" name="search"     value="Search" />
        </form>
    
    </div>

</div>
<!--Navigation Bar Ends-->
