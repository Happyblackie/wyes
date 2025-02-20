<?php
   /*
   Template Name: Team
   */

   // wp_reset_query();
 
$team = get_posts( array(
    'posts_per_page' => -1,
    'offset'         => 0,
   'post_type'      =>'team',
   'meta_key' => '_ordering', 
   'orderby' => 'meta_value_num',
    'order' => 'ASC',
) );
   ?>
<?php get_header(); ?>

   <!-- Header Start -->
           
        <section class="section-padding-inner section-bg" >
            <div class="container">
                <div class="row">

                
<?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                 $bannercaption = get_post_meta($post->ID,'_bannercaption', true); ?>
                <h1 class="text-center"> <?php the_title(); ?></h1>

                <div class="container-fluid bg-breadcrumb" >
                    <div class="container text-center py-3" style="max-width: 900px;">
                        <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <!-- <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?> -->
                        </p>    
                    </div>

                    <p> <?php the_content(); ?></p>
                     <?php endwhile; wp_reset_query(); ?>
                </div>

             

            <div class="col-12">
                        <div class="custom-text-box  mt-0">                      
                          <!-- Team Section -->
                                <section id="team" class="team section light-background">

                            <!-- Section Title -->
                            <div class="container section-title text-center pt-2" data-aos="fade-up">
                           
                            </div><!-- End Section Title -->

                            <div class="container">

                              <div class="row gy-4 mb-5">

                              <?php foreach($team as $post){




                            $desingation = get_post_meta($post->ID,'_designation', true); 
                            $management_level= get_post_meta($post->ID,'_management_level', true); 
                          
                            $linkedin = get_post_meta($post->ID,'_linkedin', true); 
                            $profilepic=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

                            ?>


                                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                  <div class="team-member">
                                    <div class="member-img">
                                      <img src="<?php echo $profilepic[0] ?>" class="img-fluid" alt="<?php echo $poset->post_title ?>">
                                      <div class="social">
                                      
                                        <a href="<?php echo   $linkedin  ?>" tartget="_blank"><i class="bi bi-linkedin"></i></a>
                                      </div>
                                    </div>
                                    <div class="member-info">
                                      <h4><?php the_title() ?></h4>
                                      <span><?php echo   $desingation  ?></span>
                                    </div>
                                  </div>
                                </div><!-- End Team Member -->

                            <?php } ?>

                              </div>

                            </div>

                            </section><!-- /Team Section -->

                        </div>

                    </div>

                </div>
            </div>
        </section>


     



        


 
<?php get_footer(); ?>

