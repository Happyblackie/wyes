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
                              <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                              </p>    
                        </div>
                     </div>

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

                    <!-- <div class="col-12">
                        <div class="custom-text-box">                      
                            <p class="mb-0">    
                            <p> <?php the_content(); ?></p>
                       </div>
                    </div> -->

                    

                    

            <!--Gallery-->

            <div class="row g-3">

                  <?php if(!empty($gallery)){
                      
                      
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

      <div class="shareit pt-5">
                          <div class="row">
                            <div class="col-lg-2 col-md-12">
                                <h5>Share it</h5>
                            </div>

                            <div class="col-2">    
                              <a class="shareit-item" href="whatsapp://send?text=<?php the_title(); ?> --> https://<?php echo get_the_permalink($post->ID); ?>" data-action="share/whatsapp/share"  target="blank" title="whatsapp"><i class="fab fa-whatsapp "></i></a>
                              </div>

                            <div class="col-2">
                                          <!-- linkedin -->
                              <a class="shareit-item" href="https://www.linkedin.com/shareArticle?mini=true&url=https://<?php echo get_the_permalink($post->ID); ?>&title=<?php the_title(); ?>" target="blank" title="linkedin"><i class="fab fa-linkedin"></i></a>

                              </div>

                            <div class="col-2">    
                              <!-- twitter -->
                              <a class="shareit-item" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=https://<?php echo get_the_permalink($post->ID); ?>" target="blank" title="twitter"><div class="bi-twitter-x">.</div></a>
                              </div>

                            <div class="col-2">
                              <!-- facebook -->
                              <a class="shareit-item" href="https://www.facebook.com/sharer/sharer.php?u=https://<?php echo get_the_permalink($post->ID); ?>" target="blank" title="facebook"><i class="fab fa-facebook "></i></a>
                              </div>

                            <div class="col-2">
                              <a href="#" class="btn btn-default btn-sm float-right" onclick="window.print();return false">
                                        <i class="fas fa-print "></i> </a>
                            </div>
                          </div>
                        </div>


                  
                            <?php endwhile; wp_reset_query(); ?>

                            <?php wpb_posts_nav(); ?>
                        </div>

                  </div>

               </div>
            </div>
        </section> <?php get_footer(); ?>