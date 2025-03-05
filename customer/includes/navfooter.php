<?php
if (!defined('MYSITE')) {
    header('location: ../index.php');
    die();
}
?>

<!-- ===Footer Start=== -->
<nav class="container-fluid bg-c1-1" style="height:150px; padding-top:10px;">
    <footer class="page-footer font-small blue pt-1">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-2"></div>
                <div class="col-md-3">
                    <h6 class="text-uppercase text-light">Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="customer_index.php" class="text-light">Home</a></li>
                        <li><a href="../sp_signup.php" class="text-light">Register as a Service Provider</a></li>
                        <li><a href="logout.php" class="text-light">Logout</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="text-uppercase text-light">Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="serviceshow.php?category_id=84" class="text-light">Category</a></li>
                        <li><a href="order_details.php" class="text-light">My Orders</a></li>
                        <li><a href="mycart.php" class="text-light">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</nav>
<!-- ===Footer End=== -->
