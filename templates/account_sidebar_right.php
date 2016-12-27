<div class="sidebar_right" >
    <div class="sidebar_right_title">My Account</div>
    <ul class="cats_right">
        <?php
        $user = $_SESSION['customer_email'];
        $get_img = "SELECT * FROM customers WHERE customer_email='$user'";
        $run_img = mysqli_query($con, $get_img);
        $row_img = mysqli_fetch_array($run_img);
        $c_image = $row_img['customer_image'];
        $c_name = $row_img['customer_name'];
        echo "<p><img src='customer_images/$c_image'/></p>";
        ?>
        <li><a href="my_account.php?my_orders">My Orders</a></li>
        <li><a href="my_account.php?edit_account">Edit Account</a></li>
        <li><a href="my_account.php?change_pass">Change Password</a></li>
        <li><a href="my_account.php?delete_account">Delete Account</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>
</div>
