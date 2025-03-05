<?php 
if (!defined('MYSITE')) {
    header('location: ../customer_index.php');
    die();
}
?>

<style>
    .cart {
        position: relative;
        display: block;
        height: auto;
        overflow: hidden;
    }

    .fa-shopping-cart {
        position: relative;
        top: 4px;
        z-index: 1;
        font-size: 24px;
        color: white;
    }

    .count {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 2;
        font-size: 11px;
        border-radius: 50%;
        background: #d60b28;
        width: 16px;
        height: 16px;
        line-height: 16px;
        display: block;
        text-align: center;
        color: white;
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
    }
</style>

<!-- ===Navbar start=== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-c1-1 sticky-top">
    <a class="navbar-brand" href="customer_index.php"> 
        <img src="../img/mainlogo.png" style="width:50px; height:50px;" alt="Logo"> 
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="customer_index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu">
                    <?php 
                    $sql = "SELECT * FROM `category`";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $category_id = $row['category_id'];
                            $category_name = $row['category_name'];
                            echo '<a class="dropdown-item" href="serviceshow.php?category_id=' . $category_id . '">' . $category_name . '</a>';
                        }
                    }
                    ?>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a href="../sp_signup.php"><button type="button" class="btn btn-outline-light mr-2">Register As a Service Provider</button></a>
            <div class="cart">
                <?php
                if (isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']);
                    echo ' <span class="count"> ' . $count . '</span>';
                }
                ?>
                <a href="mycart.php"><img src="../img/shopping-cart-icon.png" style="width:30px;" alt=""></a>
            </div>
        </form>
    </div>
</nav>
<!-- ===Navbar End=== -->
