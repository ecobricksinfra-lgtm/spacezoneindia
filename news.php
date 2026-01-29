<!DOCTYPE html>
<html lang="eng">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<meta name="description" content="Welcome to Space Zone India, where innovation meets education. We are India’s leading space science education and research company, pioneering hybrid rocket technology and inspiring the next generation of scientists and engineers">
	<meta name="keywords" content="">
	<meta name="author" content="HackGeniX">
	<!-- Page Title -->
    <title>Space Zone India - Space Science for All — From Classrooms to the Cosmos</title>
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
	<!-- Google Fonts Css-->
	<link rel="preconnect" href="../../fonts.googleapis.com/index.html">
    <link rel="preconnect" href="../../fonts.gstatic.com/index.html" crossorigin>
    <link href="../../fonts.googleapis.com/css244c5.css?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap" rel="stylesheet">
	<!-- Bootstrap Css -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<!-- SlickNav Css -->
	<link href="css/slicknav.min.css" rel="stylesheet">
	<!-- Swiper Css -->
	<link rel="stylesheet" href="css/swiper-bundle.min.css">
	<!-- Font Awesome Icon Css-->
	<link href="css/all.min.css" rel="stylesheet" media="screen">
	<!-- Animated Css -->
	<link href="css/animate.css" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Mouse Cursor Css File -->
	<link rel="stylesheet" href="css/mousecursor.css">
	<!-- Main Custom Css -->
	<link href="css/custom.css" rel="stylesheet" media="screen">

        <style>
        .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
    font-size:30px;
        box-shadow: 2px 2px 3px #999;
    z-index:100;
    }

    .my-float{
        margin-top:16px;
    }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

    <!-- Preloader Start -->
	<?php include('header.php'); ?>
	<!-- Header End -->

    <!-- Page Header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="wow fadeInUp" data-cursor="-opaque">Our Journals</h1>
                        
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

     <!-- Page Blog Start -->
    <div class="page-blog">
        <div class="container">
            <div class="row">

<?php
include('app/connect.php');

$select_query = "select * from news order by id desc";

$run = mysqli_query($connect,$select_query);

$c=0;

while ($row = mysqli_fetch_array($run)) {

$c = $c+1;

?>
                <div class="col-lg-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image">
                            <a href="<?php echo $row['link']; ?>" target="blanck" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="app/files/<?php echo $row['image']; ?>" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- post Item Content Start --> 
                        <div class="post-item-content">
                            <!-- post Item Body Start -->
                            <div class="post-item-body">
                                <h2><a href="<?php echo $row['link']; ?>" target="blanck" ><?php echo $row['name']; ?>‌</a></h2>
                            </div>
                            <!-- Post Item Body End-->

                            <!-- Post Item Button Start-->
                            <div class="post-item-btn">
                                <a href="<?php echo $row['link']; ?>" target="blanck"  class="post-btn"><i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            <!-- Post Item Button End-->
                        </div>
                        <!-- post Item Content End -->
                    </div>
                    <!-- Post Item End -->
                </div>
<?php } ?>


               
            </div>
        </div>
    </div>
    <!-- Page Blog End -->



   <?php include('footer.php'); ?>
    <!-- Main Footer Section End -->
    
    <!-- Jquery Library File -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Validator js file -->
    <script src="js/validator.min.js"></script>
    <!-- SlickNav js file -->
    <script src="js/jquery.slicknav.js"></script>
    <!-- Swiper js file -->
    <script src="js/swiper-bundle.min.js"></script>
    <!-- Counter js file -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Magnific js file -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- SmoothScroll -->
    <script src="js/SmoothScroll.js"></script>
    <!-- Parallax js -->
    <script src="js/parallaxie.js"></script>
    <!-- MagicCursor js file -->
    <script src="js/gsap.min.js"></script>
    <script src="js/magiccursor.js"></script>
    <!-- Text Effect js file -->
    <script src="js/SplitText.js"></script>
    <script src="js/ScrollTrigger.min.js"></script>
    <!-- YTPlayer js File -->
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <!-- Wow js file -->
    <script src="js/wow.min.js"></script>
    <!-- Main Custom js file -->
    <script src="js/function.js"></script>
	<script src="../../demo.awaikenthemes.com/assets/js/theme-panel.js"></script>
</body>
</html>