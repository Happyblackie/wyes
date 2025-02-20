<?php
   /*
   Template Name: All Testimonials Page
   */


   $testimonials = get_posts( array(
    'posts_per_page' => -1,
    'offset'         => 0,
   'post_type'      =>'testimonials',
    'order' => 'DESC',
 ) );
   ?>




<?php get_header(); ?>


<!-- Header Start -->
<section class="section-padding-inner section-bg" id="">
  <div class="container">
    <div class="row"> <?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                 $bannercaption = get_post_meta($post->ID,'_bannercaption', true); ?> <h1 class="text-center"> <?php the_title(); ?> </h1>
      <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-3" style="max-width: 900px;">
          
          <!-- <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"><?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?> </p> -->

          <p> 
            <!-- <?php the_content(); ?>  -->
             blah blah .... 
          </p>
        </div>
       
      </div> <?php endwhile; wp_reset_query(); ?>
      <!--/Header Start -->
      <!-- Blog Start -->
      <section class="news-section">
        <div class="container">
                 <?php foreach($testimonials as $testimonial) { 
                        $slide = wp_get_attachment_image_src( get_post_thumbnail_id($testimonial->ID), 'full'); ?>
                        <div class="divmore ">
                               <div class="row mb-5">
                                   <div class="col-md-4 col-12">
                                        <a href="<?php echo get_the_permalink($testimonial->ID); ?>">
                                            <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-testimonials.jpg <?php ; }?>" class=" news-image  img-fluid rounded" alt="<?php echo $testimonial->post_title; ?>">
                                        </a> 
                                     </div>
                                     <div class="col-md-7 col-12">
                                      <div class="custom-text-box">  
                                        <h5 class="mb-3"><?php echo $testimonial->post_title; ?> </h5>
                                        <?php echo wp_trim_words($testimonial->post_content, 80);  ?> 
                                        <a href="<?php echo get_the_permalink($testimonial->ID); ?>" class="testimonial-link">Read more</a>
                                      </div>
                                    </div>
                                </div>
                       </div>

                       
                      <?php  } wp_reset_query();  ?>  
              
       
            <div class="row">
                    <span class="col d-flex justify-content-start"> <a href="#" id="loadMore">Load More</a></span>
                <span class="col d-flex justify-content-end"><p class="totop"> <a href="#top">Back to top</a> </p> </span>
                </div>
            </div> 
        </div>
      </section> <?php get_footer(); ?>