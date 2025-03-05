<?php
// Ensure secure access
define('MYSITE', true);
include '../db/dbconnect.php';

$title = 'Main';
$css_directory = '../css/main.min.css';
include 'includes/header.php';
include 'includes/navbar.php';
?>
<!-- SEO Optimized Meta Tags -->
<meta name="description" content="Find top-rated home service providers for cleaning, plumbing, electrical repairs & more. Book professional home services easily!">
<meta name="keywords" content="home service providers, home maintenance, plumbing services, electrician near me, best home cleaning services">
<meta name="author" content="Your Website Name">

<style>
    .card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
        background-color: #0A2647;
        color: white;
    }
</style>

<body>
<!-- SEO Optimized Headings -->
<marquee><h1>🏡 Book Trusted Home Service Providers – Cleaning, Plumbing & More! 🔧✨</h1></marquee>
<h2 style="color: #ff6600; font-weight: bold; text-align: center;">✨ Why Choose Our Home Services? ✨</h2>
<h3 style="color: #007bff; text-align: center;">✅ Certified & Experienced Electricians, Plumbers & Cleaners 🛠️</h3>
<!-- SEO Optimized Image ALT Tags -->
<!-- Eye-Catching Service Descriptions -->
<p style="color: #28a745; font-size: 18px; font-weight: bold; text-align: center;">🚰 Expert & Budget-Friendly Plumbing Solutions – Fast & Reliable Fixes! 💦</p>
<p style="color: #d63384; font-size: 18px; font-weight: bold; text-align: center;">🧼 Transform Your Home with 5-Star Cleaning Services – Sparkle & Shine! ✨</p>

<!-- Existing code remains unchanged below -->
<?php
// Your existing booking system, authentication, and other functionalities remain untouched.
?>

    <img src="../img/purpule.png" class="img-fluid mb-5" alt="Landing Page image">

    <div class="container">
        <div class="row row-cols-3">
            <?php
            $sql = "SELECT * FROM `category`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="serviceshow.php?category_id=' . $row['category_id'] . '" class="text-reset">
                            <div class="col mb-4">
                                <div class="card card-deck">
                                    <img src="../img/' . $row['category_id'] . '.jpg" class="card-img-top" style="width:349px; height:200px; object-fit:cover;" alt="Service Image"> 
                                    <div class="card-body text-center">
                                        <h5 class="card-title">' . $row['category_name'] . '</h5>
                                    </div>
                                </div>
                            </div>
                          </a>';
                }
            } else {
                echo 'No categories found';
            }
            ?>
        </div>
    </div>

    <?php
    include '../includes/footer.php';
    include 'includes/navfooter.php';
    ?>
</body>
