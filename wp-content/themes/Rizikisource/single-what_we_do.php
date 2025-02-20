
<?php 

$editScreenId = $post->ID;


$whatewedo = get_posts( array(
  'posts_per_page' => -1,
  'offset'         => 0,
 'post_type'      =>'whatwedo',
  'order' => 'ASC',
));



get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                 $bannercaption = get_post_meta($post->ID,'_bannercaption', true); ?>
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

                    <div class="col-lg-8">
                        <div class="custom-text-box">                      
                            <p class="mb-0">    
                            <p> <?php the_content(); ?></p>

                            <?php endwhile; wp_reset_query(); ?>
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="custom-text-box">                      
                            <p class="mb-0">    
                            <div class="list-group">
                    
                                <?php
                                foreach ($whatewedo  as $wed ) :
                                    setup_postdata($wed );
                                    $postMeta=get_post_meta($wed->ID);
                                ?>
                            
                                        <a href="<?php the_permalink($wed->ID); ?>" class="list-group-item list-group-item-action <?php if($wed->ID == $editScreenId){echo 'active aria-current="true"';} ?> " ><?php echo $wed->post_title; ?></a>
                                <?php
                                endforeach; wp_reset_query(); 
                                    ?>
                            </div>
                        </div>
                        
                        </div>

                    </div>

                </div>
            </div>
        </section>


 
<?php get_footer(); ?>

