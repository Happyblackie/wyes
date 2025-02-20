<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>
        <?php if(is_front_page()) {
    echo "Home";
     } else {
    the_title(); 
      
 }

  // if (is_single('Example') :
    $postID = get_the_ID();

    // echo   $postID;
    // exit;
    

    $slide = wp_get_attachment_image_src( get_post_thumbnail_id($postID), '1200 x 628');
 
 
 ?>
 </title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <meta property="og:image" content="<?php if ($slide[0]) { echo  $slide[0] ; }   else {  bloginfo('template_directory'); ?>/img/feature-default.jpg <?php } ?>"> 

  <!-- Favicons -->
  <link href="<?php bloginfo('template_directory'); ?>/assets/img/favicon.png" rel="icon">
  <link href="<?php bloginfo('template_directory'); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php bloginfo('template_directory'); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php bloginfo('template_directory'); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php bloginfo('template_directory'); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php bloginfo('template_directory'); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php bloginfo('template_directory'); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?php bloginfo('template_directory'); ?>/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Multi
  * Template URL: https://bootstrapmade.com/multi-responsive-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="service-details-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?php echo site_url();?>" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?php bloginfo('template_directory'); ?>/img/logo2.png" alt="">

       
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
       <?php display_menu('home') ?>
         
          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#"> <?php display_menu('menu-about-us') ?></a></li>
         
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#about">Get Started</a>

    </div>
    
  </header>

  <main class="main">