<?php
/*
Template Name: What we Do
*/

 
$whatwedo = get_posts( array(
   'posts_per_page' => -1,
   'offset'         => 0,
  'post_type'      =>'whatwedo',
   'order' => 'ASC',
) );
  ?>
<?php get_header(); ?>

   <!-- Header Start -->
           
   <section class="section-padding-inner section-bg" id="section_2">
            <div class="container">
                <div class="row">

                
           <?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                 $bannercaption = get_post_meta($post->ID,'_bannercaption', true); ?>
                <h1 class="text-center"> <?php the_title(); ?></h1>

                <div class="container-fluid bg-breadcrumb" >
                    <div class="container text-center py-3" style="max-width: 900px;">
                        <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                        </p>    
                    </div>
                    

                    <p> 
                    <div class="col-12 pb-3">
                        <img src="<?php 
                       if($banner){
                       echo $banner[0];
                       }
                       else{ 
                          echo bloginfo('template_directory');?>/img/defaultbanner.jpg'
                    <?php  } ?>"
                            class="custom-text-box-image img-fluid" alt="">
                   </div>
                   
                     <?php the_content(); ?>
                     </p>
                  
                </div>

            <?php endwhile; wp_reset_query(); ?>

       
   <!--/Header Start -->

            <section class="" >
                  <div class="container">
                     <div class="row">

                        <div class="col-lg-12 col-12 text-center  mb-5 ">
                            <div class="custom-block-wrap">
                                 <div class="custom-block-body">
                                    
                                    <p>
                                       Worldlink Youth Empowerment Services Trust adopts a
                                       hands-on approach through mentorship, training, policy
                                       advocacy, and partnerships.
                                    </p>
                                    <p>
                                       We create economic opportunities while strengthening
                                       food security and environmental sustainability. Together,
                                       we are shaping a greener, more prosperous future.
                                    </p>
                                 </div>
                        
                            </div>
                        </div>

                     <?php foreach($whatwedo as $w) { 
                        $slide = wp_get_attachment_image_src( get_post_thumbnail_id($w->ID), '1200x628');
                     ?>

                        <div class="col-lg-4 col-md-4 col-12 pb-5 mb-5 mb-lg-0">
                              <div class="custom-block-wrap">
                                 <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>"
                                    class="custom-block-image img-fluid" alt="<?php echo $w->post_title; ?>">

                                 <div class="custom-block">
                                    <div class="custom-block-body">
                                          <h5 class="mb-3"><?php echo $w->post_title; ?></h5>
                                          
                                          <p> <?php echo wp_trim_words($w->post_content, 7); ?> </p>

                                    </div>

                                    <a href="<?php echo get_the_permalink($w->ID); ?>" class="custom-btn btn">Learn More</a>
                                 </div>
                              </div>
                        </div>
                      <?php wp_reset_query();  }?> 


                     

                     </div>
                  </div>
            </section>


                        </div>

                    </div>

                </div>
            </div>
        </section>

     
                  

<!-- Service End -->
<?php get_footer(); ?>
	