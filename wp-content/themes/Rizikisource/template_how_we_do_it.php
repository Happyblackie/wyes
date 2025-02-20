<?php
/*
Template Name: How we do it
*/

 
$howwedoit = get_posts( array(
   'posts_per_page' => -1,
   'offset'         => 0,
  'post_type'      =>'how_we_do_it',
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
                <h1 class="text-center"> Milestones </h1>

                <div class="container-fluid bg-breadcrumb" >
                    <div class="container text-center py-3" style="max-width: 900px;">
                        <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                        </p>    
                    </div>

                    

                    <p> 

                    


                     <?php the_content(); ?>
                    </p>
                  
                </div>

            <?php endwhile; wp_reset_query(); ?>

       
   <!--/Header Start -->

            <section class="">
                  <div class="container">
                     <div class="row justify-content-center">

                        <div class="col-lg-12 col-12 text-center ">
                            
                        </div>
                     <?php foreach($howwedoit as $w) { 
                        $slide = wp_get_attachment_image_src( get_post_thumbnail_id($w->ID), '1200x628');
                     ?>

                        <div class="col-lg-6 col-md-6 col-12 pb-5 mb-5 mb-lg-0">
                              <div class="custom-block-wrap">
                                 
                                  

                                 <div class="custom-block">
                                    <div class="custom-block-body">
                                          <h5 class="mb-3"><?php echo $w->post_title; ?></h5>

                                          <p> <?php echo wp_trim_words($w->post_content, 15); ?> </p>

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
	