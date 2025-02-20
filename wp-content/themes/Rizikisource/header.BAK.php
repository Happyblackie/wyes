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

<body class="index-page">





<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
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
      <link rel='dns-prefetch' href='//translate.google.com' />
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="We facilitate workplace diversity, self-employment, disability inclusion and linkage to over six Million people with disabilities in Kenya who have particular skill sets, currently untapped for recruitment as a value proposition for companies, organizations and government formations" name="description">

	  <meta property="og:image" content="<?php if ($slide[0]) { echo  $slide[0] ; }   else {  bloginfo('template_directory'); ?>/img/feature-default.jpg <?php } ?>"> 
      <!-- Favicon -->
      <link href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" rel="icon">
      <!-- Google Web Fonts -->
   
    <link href="<?php bloginfo('template_directory'); ?>/css/bootstrap-icons.css" rel="stylesheet">
     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      
    
      <!-- Customized Bootstrap Stylesheet -->
      <link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="<?php bloginfo('template_directory'); ?>/css/main.css" rel="stylesheet">
     
    <link href="<?php bloginfo('template_directory'); ?>/css/bootstrap-icons.css" rel="stylesheet">
  
    <link href="<?php bloginfo('template_directory'); ?>/lib/lightbox/css/lightbox.min.css" rel="stylesheet">


      <link href="<?php bloginfo('template_directory'); ?>/lib/splide/css/splide.min.css" rel="stylesheet">

      <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">
   </head>

   <body id="section_1">
    <header class="site-header">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-telephone me-2"></i>
                        +254722-717-657

                    </p>

                    <p class="d-flex mb-0 me-4">
                        <i class="bi-envelope me-2"></i>

                        <a href="mailto:info@rizikisource.org">
                            info@wyes.or.ke
                        </a>
                    </p>

                    <p class="d-flex mb-0 me-4">
                        <i class="bi-globe me-2"></i>

                        <a href="mailto:info@rizikisource.org">
                            www.wyes.or.ke
                        </a>
                    </p>

                </div>

                <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href=""  target="_blank" class="social-icon-link"><div class="bi-twitter-x">.</div></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="" target="_blank" class="social-icon-link bi-facebook"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="" target="_blank" class="social-icon-link bi-linkedin"></a>
                        </li>


                        <li class="social-icon-item">
                            <a href="" target="_blank" class="social-icon-link bi-youtube"></a>
                        </li>


                        <li class="social-icon-item">
                            <a href="" target="_blank" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-light shadow-lg desktoponly">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url();?>">
              <img src="<?php bloginfo('template_directory'); ?>/img/logo2.png" class="logo img-fluid" alt="WYES">
                
                <!-- <span>
                    Riziki Source
                    <small>Non-profit Organization</small>
                </span> -->
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url();?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link click-scroll dropdown-toggle" href="<?php echo site_url();?>/about-us"
                            id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">About Us</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo site_url();?>/who-we-are">Who we are</a></li>
<!-- 
                            <li><a class="dropdown-item" href="<?php echo site_url();?>/why-we-do-our-work">Why we do our Work</a></li> -->

                            <li><a class="dropdown-item" href="<?php echo site_url();?>/what-we-do">What we do</a></li>


                            <li><a class="dropdown-item" href="<?php echo site_url();?>/how-we-do-it">Milestones</a></li>

                            <li><a class="dropdown-item" href="<?php echo site_url();?>/board-of-directors">Board of Trustees</a></li>

                            <li><a class="dropdown-item" href="<?php echo site_url();?>/our-team">Our Team</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link click-scroll dropdown-toggle" href="<?php echo site_url();?>/resources"
                            id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Resources</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo site_url();?>/events">Events</a></li>

                            <li><a class="dropdown-item" href="<?php echo site_url();?>/blog">Blog</a></li>

                            <li><a class="dropdown-item" href="<?php echo site_url();?>/publications">Publications</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url();?>/testimonials/" title="Testimonials">Testimonials</a></li>

                            <li><a class="dropdown-item" href="<?php echo site_url();?>/career-options/" title="Career Options">Career Options</a></li>

                       
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="<?php echo site_url();?>/get-involved">Get Involved</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="<?php echo site_url();?>/contact-us">Contact</a>
                    </li>

                    

                    <li class="nav-item ms-3">
                        <a class="nav-link custom-btn custom-border-btn btn" href="<?php echo site_url();?>/donate">Donate</a>
                    </li>

                </ul>

                <div class="ms-3">
                    <button class="btn-search btn btn-primary btn-md-square rounded-circle flex-shrink-0" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </nav>

      <!--- /overlay -->
      <!-- /mega Menu -->
      <!-- MObile Mega Menu-->
      <!-- header start -->
      <header class="header bg-light mobileonly" id="sticky-header">
         <div class="container">
         <!-- <div class="row v-center"> -->
         <div class="row">
            <div class="col-7 item-left mobileonly">
               <a href="<?php echo site_url();?>" class="">
                  <image src="<?php bloginfo('template_directory'); ?>/img/logo2.png" heigth="auto" width="70%">
               </a>
            </div>
            <!-- menu start here -->
            <div class="header-item item-center mobileonly">
               <div class="menu-overlay"></div>
               <nav class="menu">
                  <div class="mobile-menu-head">
                     <div class="go-back"><i class="fa fa-angle-left"></i></div>
                     <img  class="mx-2" src="<?php bloginfo('template_directory'); ?>/img/favicon.ico" alt="Menu Logo" width="36" height="36"/> 
                     <div class="current-menu-title"></div>
                     <div class="mobile-menu-close">&times;</div>
                  </div>
                  <ul class="menu-main mobileonly">
                     <li>
                        <a href="<?php echo site_url();?>" class="nav-item nav-link">Home</a>
                     </li>
                     <li class="menu-item-has-children">
                        <a href="#">About Us <i class="fas fa-angle-down"></i></a>
                        <div class="sub-menu single-column-menu">
                           <ul>
                             
                              <li class="list-group list-group-flush"><a href="<?php echo site_url();?>/who-we-are/" title="Who we are ">Who we are</a></li>
                               
                              <!-- <li class="list-group list-group-flush"><a href="<?php echo site_url();?>/why-we-do-our-work/" title="Why we do our work">Why we do our work</a></li> -->

                              <li class="list-group list-group-flush"><a href="<?php echo site_url();?>/what-we-do" title="What we do">What we do</a></li>
                               
                              <li class="list-group list-group-flush"><a href="<?php echo site_url();?>/how-we-do-it" title="How we do it">How we do it</a></li>

                            

                              <li class="list-group list-group-flush"><a  href="<?php echo site_url();?>/board-of-directors" title="Our Team ">Board of Directors </a></li>

                              <li class="list-group list-group-flush"><a href="<?php echo site_url();?>/our-team/" title="Our Team ">Our Team</a></li>

                             


                            
                           </ul>
                     </li>
                     <li class="menu-item-has-children">
                        <a href="#">Resources<i class="fas fa-angle-down"></i></a>
                        <div class="sub-menu single-column-menu">
                           <ul>

                        
                              <li class="list-group list-group-flush"><a href="<?php echo site_url();?>/events" title="News">Events</a></li>
                               
                              <li class="list-group list-group-flush"><a href="<?php echo site_url();?>/blog" title="Blog">Blog</a></li>
                               
                              <li class="list-group list-group-flush"><a href="<?php echo site_url();?>/publications/" title="Publications">Publications</a></li>
                              <li class="list-group list-group-flush"><a href="<?php echo site_url();?>/testimonials/" title="Testimonials">Testimonials</a></li>
                              
                              <li class="list-group list-group-flush"><a  href="<?php echo site_url();?>/career-options/" title="Career Options">Career Options</a></li>

                       
                            
                           </ul>
                     </li>
                     <li>
                     <a href="<?php echo site_url();?>/get-involved" class="nav-item nav-link">Get Involved</a>
                     </li>
                     <li>
                     <a href="<?php echo site_url();?>/contact-us" class="nav-item nav-link">Contact Us</a>
                     </li>

                     <li class="nav-item p-3 pt-2">
                        <a class="nav-link custom-btn custom-border-btn btn" href="<?php echo site_url();?>/donate">Donate</a>
                    </li>
                  </ul>
               </nav>
               </div>
               <!-- menu end here -->
               <div class="col-5 d-flex justify-content-end mobileonly">
                
               <div class="ms-3">
                    <button class="mobileonly btn-search btn btn-primary btn-md-square rounded-circle flex-shrink-0" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                </div>
                  <!-- <a href="#"><i class="fas fa-search mobileonly"></i></a> -->
                  <!-- <a href="#"><i class="far fa-heart"></i></a>
                     <a href="#"><i class="fas fa-shopping-cart"></i></a> -->
                  <!-- mobile menu trigger -->
                  <div class="mobile-menu-trigger pt-3">
                     <span></span>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- header end -->

 
       <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center bg-primary">
                     <div class="input-group w-50 mx-auto d-flex">
                      
                        <form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
                        <div class="row search-sino">
                        <div class="col-10 d-flex justify-content-end">
                     <input type="search"  class="form-control p-3" aria-describedby="search-icon-1"  placeholder="keywords" name="s" id="searchbox" value="<?php echo esc_attr( get_search_query() ); ?>">
                     </div>
                     <div class="col-2 d-flex justify-content-start">
                     <button type="submit" class="search-submit btn bg-light border nput-group-text p-3"><i class="fa fa-search fa-2x" style="color:#fd9600;"></i></button>
                     </div>
                     </div>
                  </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        <main id="body-start">


   

  
    
