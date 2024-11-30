<?php
session_start();
include "./db/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicons Icon -->
  <link rel="icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
  <title>ecommerce</title>

  <!-- Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS Style -->
  <link rel="stylesheet" type="text/css" href="css/animate.css" media="all" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/animate.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/revslider.css">
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.mobile-menu.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/flexslider.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200italic,300,300italic,400,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700,900' rel='stylesheet' type='text/css'>

  <style>
    .cloud-zoom-big {
      background-color: #ccc;
    }

    .mini-cart .actions .btn-checkout a {
      color: #FFFFFF;
    }
  </style>
</head>

<body class="cms-index-index cms-home-page">
  <div id="page">
    <?php
    if (isset($_GET['quanly'])) {
      $quanly = $_GET['quanly'];
    } else {
      $quanly = '';
    }

    if ($quanly == 'grid' && isset($_GET['danhmuc'])) {
      include "./includes/header.php";
      include "./includes/grid.php";
    } 
    elseif ($quanly == 'list' && isset($_GET['danhmuc'])) {
      include "./includes/header.php";
      include "./includes/list.php";
    } 
    elseif ($quanly == 'chitiet' && isset($_GET['id'])) {
      include "./includes/header.php";
      include "./includes/product_detail.php";
      include "./includes/best-seller.php";
      include "./includes/featured-slider.php";
    } 
    elseif (isset($_GET['checkout']) && isset($_SESSION['name'])) {
      include "./includes/checkout.php";
    } 
    elseif (isset($_GET['about'])) {
      include "./includes/header.php";
      include "./includes/about.php";
    } 
    elseif (isset($_GET['faq'])) {
      include "./includes/header.php";
      include "./includes/faq.php";
    } 
    elseif (isset($_GET['contact'])) {
      include "./includes/header.php";
      include "./includes/contact.php";
    } 
    elseif (isset($_GET['dashboard']) && isset($_SESSION['name'])) {
      include "./includes/header.php";
      include "./includes/dashboard.php";
    } 
    elseif (isset($_GET['blog']) && !isset($_GET['blog_id'])) {
      include "./includes/header.php";
      include "./includes/blog.php";
    } 
    elseif (isset($_GET['blog']) && isset($_GET['blog_id'])) {
      include "./includes/header.php";
      include "./includes/blog-detail.php";
    } 
    elseif (isset($_GET['cart']) && isset($_SESSION['name'])) {
      include "./includes/cart.php";
      include "./includes/best-seller.php";
    } 
    elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
      include "./includes/header.php";
      include "./includes/slider.php";
      include "./includes/banner.php";
      include "./includes/best-seller.php";
      include "./includes/featured-slider.php";
      include "./includes/offer-start.php";
      include "./includes/lastest-blog.php";
    } 
    else {
      include "./includes/header.php";
      include "./includes/error.php";
    }

    include "./includes/footer.php";
    ?>
  </div>

  <?php
  include "./includes/mobile-menu.php";
  ?>

  <!-- JavaScript -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/cloud-zoom.js"></script>
  <script type="text/javascript" src="js/parallax.js"></script>
  <script type="text/javascript" src="js/revslider.js"></script>
  <script type="text/javascript" src="js/common.js"></script>
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/jquery.flexslider.js"></script>
  <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
  <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
  <script type='text/javascript'>
    jQuery(document).ready(function() {
      jQuery('#rev_slider_4').show().revolution({
        dottedOverlay: 'none',
        delay: 5000,
        startwidth: 1920,
        startheight: 650,

        hideThumbs: 200,
        thumbWidth: 200,
        thumbHeight: 50,
        thumbAmount: 2,

        navigationType: 'thumb',
        navigationArrows: 'solo',
        navigationStyle: 'round',

        touchenabled: 'on',
        onHoverStop: 'on',

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        spinner: 'spinner0',
        keyboardNavigation: 'off',

        navigationHAlign: 'center',
        navigationVAlign: 'bottom',
        navigationHOffset: 0,
        navigationVOffset: 20,

        soloArrowLeftHalign: 'left',
        soloArrowLeftValign: 'center',
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: 'right',
        soloArrowRightValign: 'center',
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,

        shadow: 0,
        fullWidth: 'on',
        fullScreen: 'off',

        stopLoop: 'off',
        stopAfterLoops: -1,
        stopAtSlide: -1,

        shuffle: 'off',

        autoHeight: 'off',
        forceFullWidth: 'on',
        fullScreenAlignForce: 'off',
        minFullScreenHeight: 0,
        hideNavDelayOnMobile: 1500,

        hideThumbsOnMobile: 'off',
        hideBulletsOnMobile: 'off',
        hideArrowsOnMobile: 'off',
        hideThumbsUnderResolution: 0,

        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        fullScreenOffsetContainer: ''
      });
    });
  </script>
</body>

</html>