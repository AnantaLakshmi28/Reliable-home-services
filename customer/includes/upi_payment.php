<?php
session_start();
if (!isset($_GET['order_id']) || !isset($_GET['customer_id']) || !isset($_GET['total'])) {
    echo "<script>alert('Invalid Payment Request!'); window.location.href='mycart.php';</script>";
    exit;
}

$order_id = $_GET['order_id'];
$customer_id = $_GET['customer_id'];
$total = $_GET['total'];

// UPI Payment Details
$upi_id = "9908621727@ptsbi"; // Replace with your UPI ID (PhonePe, GPay, Paytm)
$payee_name = "AnantaLakshmi Sabbella"; // Replace with your Business/Personal Name

$upi_link = "upi://pay?pa=$upi_id&pn=$payee_name&am=$total&cu=INR&tr=$order_id";
$qr_code_url = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" . urlencode($upi_link) . "&choe=UTF-8";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPI Payment</title>
</head>
<body>
    <div style="text-align: center;">
        <h2>Scan to Pay via UPI</h2>
        <img src="<?php echo $qr_code_url; ?>" alt="UPI QR Code" class="img-fluid">
        <p><strong>Order ID:</strong> <?php echo $order_id; ?></p>
        <p><strong>Total Amount: ₹<?php echo $total; ?></strong></p>
        <p><strong>Payee Name:</strong> <?php echo $payee_name; ?></p>
        <a href="<?php echo $upi_link; ?>" class="btn btn-primary">Pay Now</a>
        <br><br>
        <p>After Payment, click the button below:</p>
        <a href="order_placed.php?order_id=<?php echo $order_id; ?>&customer_id=<?php echo $customer_id; ?>" class="btn btn-success">I Have Paid</a>
    </div>
</body>
</html>
