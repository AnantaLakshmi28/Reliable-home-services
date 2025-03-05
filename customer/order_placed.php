<?php
define('MYSITE', true);
include '../db/dbconnect.php';

$title = 'Main';
$css_directory = '../css/main.min.css';
$css_directory2 = '../css/main.min.css.map';
include 'includes/header.php';
include 'includes/navbar.php';

// Check if order_id and customer_id exist
if (isset($_GET['order_id']) && isset($_GET['customer_id'])) {
    $order_id = $_GET['order_id'];
    $customer_id = $_GET['customer_id'];
} else {
    die("Invalid Order");
}
?>

<body>
    <div class="container">
        <section class="h-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-10 col-xl-8">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-header px-4 py-5" style="background-color: #227c70;">
                                <center>
                                    <img src="../img/done_100.svg" alt="order_done">
                                    <h4 class="text-light mb-0">Thanks for your Order, <u><?php echo $_SESSION['username'] ?></u>!</h4>
                                </center>
                            </div>
                            <div class="card-body p-4">
                                <center>
                                    <form action="../php/invoice.php" method="post">
                                        <button type="submit" name="invoice" class="btn btn-c1-1">Invoice</button>
                                        <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                                        <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>">
                                    </form>
                                    <br>
                                    <a href="order_details.php"><button class="btn btn-c1-1">Order Status</button></a>
                                </center>
                            </div>

                            <!-- Review Form -->
                            <div class="card-body p-4">
                                <h5 class="text-center">Leave a Review</h5>
                                <form action="../php/submit_review.php" method="POST">
                                    <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>">
                                    <input type="hidden" name="order_id" value="<?php echo $order_id ?>">

                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Rating (1-5):</label>
                                        <input type="number" name="rating" class="form-control" min="1" max="5" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Comment:</label>
                                        <textarea name="comment" class="form-control" required></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-success">Submit Review</button>
                                </form>
                            </div>

                            <!-- Display Reviews -->
                            <div class="card-body p-4">
                                <h5 class="text-center">Customer Reviews</h5>
                                <?php
                                $sql = "SELECT * FROM reviews WHERE order_id = '$order_id' ORDER BY created_at DESC";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<div class='border p-3 my-2'>
                                            <h6>{$row['name']} ({$row['rating']}⭐)</h6>
                                            <p>{$row['comment']}</p>
                                            <small>Posted on: {$row['created_at']}</small>
                                          </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include '../includes/footer.php'; ?>
</body>
</html>
