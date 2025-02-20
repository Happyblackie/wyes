<?php
/*
Template Name: Resources Main
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
                        <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                        </p>  
                        
                        <p> <?php the_content(); ?></p>
                    </div>

                  
                  
                </div>

            <?php endwhile; wp_reset_query(); ?>

 <!--/Header Start -->

            <section class="">
                  <div class="container">
                     <div class="row justify-content-center">

                      
                    

                     <div class="col-lg-4">
                        <div class="custom-text-box mt-0">                      
                            <p class="mb-0">    
                            <ul class="list-group">


                            <li class ="list-group-item list-group-item-action">
                               <?php display_f_menu('menu-resources'); ?>
                            </li>
                        </ul>
            </div>
                        </div>
                    


                     

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
	