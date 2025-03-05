<?php
define('MYSITE', true);
include 'db/dbconnect.php';

$title = 'Main';
$css_directory = 'css/main.min.css';
$css_directory2 = 'css/main.min.css.map';
include 'includes/header.php';
include 'includes/navbar.php';

?>

<style>
    .card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
        background-color: #0A2647;
        color: white;
    }
</style>
<!-- SEO Optimized Meta Tags -->
<meta name="description" content="Find top-rated home service providers for cleaning, plumbing, electrical repairs & more. Book professional home services easily!">
<meta name="keywords" content="home service providers, home maintenance, plumbing services, electrician near me, best home cleaning services">
<meta name="author" content="Your Website Name">
<body style="">


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



    <!-- ===landing page image Start=== -->
    <img src="img/purpule.png" class="img-fluid mb-5" alt="Landing Page image">
    <!-- ===landing page image End=== -->



    <!-- ===main area page Start=== -->

    <div class="container">
        <div class="row row-cols-3">


            <?php // category view code. Data get from category table
            $sql = "SELECT * FROM `category`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                    echo '
                    <a href="serviceshow.php?category_id='. $category_id .'" class="text-reset">
                        <div class="col mb-4">
                            <div class="col">
                                 <div class="card card-deck">
                                 <img src="img/'.$category_id.'.jpg" class="card-img-top" style="width:349px; height:200px; object-fit:cover;" alt="..."> 
                                 <div class="card-body text-center">
                                        <h5 class="card-title">' . $category_name . '</h5>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </a>
                                    ';
                                }
            } else {
                echo 'note inserted';
            }
            
            ?>
    
    <!-- <img src="https://source.unsplash.com/349x149/?'. $category_name .',urbanclap,homeserviceprovider" class="card-img-top" alt="...">  -->

        </div>
    </div>
    <!-- ===main area page End=== -->




    <?php
    include 'includes/footer.php';
    include 'includes/navfooter.php';
    ?>

<!-- Chatbot Button -->
<button onclick="openChatbot()" style="position: fixed; bottom: 20px; right: 20px; background: #007bff; color: #fff; border: none; padding: 12px 15px; border-radius: 50px; font-size: 16px; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.2);">
    💬 Chat with Us
</button>

<!-- Chatbot Popup -->
<div id="chatbot-container" style="display: none; position: fixed; bottom: 80px; right: 20px; width: 350px; height: 350px; border: 2px solid #007bff; background: white; box-shadow: 0 5px 10px rgba(0,0,0,0.3); border-radius: 10px; z-index: 1000;">
    <div style="background: #007bff; color: #fff; padding: 10px; text-align: center; font-weight: bold;">
        🤖 Chat Support
        <span onclick="closeChatbot()" style="float: right; cursor: pointer;">❌</span>
    </div>
    <iframe src="chatbot.html" width="100%" height="400px" style="border:none;"></iframe>
</div>

<!-- JavaScript for Chatbot Popup -->
<script>
function openChatbot() {
    document.getElementById("chatbot-container").style.display = "block";
}
function closeChatbot() {
    document.getElementById("chatbot-container").style.display = "none";
}
</script>


    <!-- <div class="col mb-4">
        <div class="col">
            <div class="card card-deck">
                <div class="card-body text-center">
                    <h5 class="card-title ">Card title</h5>
                </div>
            </div>
        </div>
    </div> -->