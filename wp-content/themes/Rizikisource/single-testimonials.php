<?php 
set_views($post->ID);


$editScreenId = $post->ID;

$args = array(
    'taxonomy' => array( 'post_tag' ), 
    'number'     => 5,
    'order'      => 'DESC',
); 

$tags = get_tags($args );


get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                 $bannercaption = get_post_meta($post->ID,'_bannercaption', true); 
                  $gallery = get_post_meta($post->ID, '_newsgallery', false);
                  $post_name_id = get_post_field( 'ID', get_post() );

                  ?>
   <!-- Header Start -->
   

        
        <section class="section-padding-inner section-bg" id="section_2">
            <div class="container">
                <div class="row">
                     <h1 class="text-center"> <?php the_title(); ?></h1>

                     <div class="container-fluid bg-breadcrumb" >
                        <div class="container text-center py-3" style="max-width: 900px;">
                              <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                              <!-- <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?> -->
                              </p>    
                        </div>
                     </div>

                    <div class="col-md-4 col-12 pb-3">
                        <img src="<?php 
                       if($banner){
                       echo $banner[0];
                       }
                       else{ 
                          echo bloginfo('template_directory');?>/img/default-testimonial.jpg'
                    <?php  } ?>"
                            class="img-fluid" alt="">
                    </div>

                    <div class="col-md-8 col-12">
                        <div class="custom-text-box">                      
                            <p class="mb-0">    
                            <p> <?php the_content(); ?></p>


                    

            <!--Gallery-->

            <div class="row g-3">

          <?php    if(!empty($gallery)){
              
               
              foreach($gallery as $thumb_id){

              $slide=wp_get_attachment_image_src( $thumb_id, 'full');
              
              ?>

              <div class="col-4">
                  <div class="newsgallery rounded">
                        <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>" class="img-fluid w-100" alt="">
                        <div class="newsgallery-search-icon">
                           <a href="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>" data-lightbox="newsgallery-1" class="my-auto"><i class="fas fa-link text-white"></i></a>
                        </div>
                     </div>
                </div>


           <?php  } }?>
      
           </div>
     

<!--/Gallery End-->

                  
                            <?php endwhile; wp_reset_query(); ?>

                            <?php wpb_posts_nav(); ?>
                        </div>

                  </div>

               </div>
            </div>
        </section> <?php get_footer(); ?>