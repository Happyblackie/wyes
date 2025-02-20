<?php

$url= url();

 $slug = trim(parse_url($url, PHP_URL_PATH), '/');

$category_slug= basename(parse_url($url, PHP_URL_PATH));


 

 $category_id=  get_the_ID();

$category_detail=get_the_category($category_id); // $post->ID





  get_header(); 






?>

   <!-- Header Start -->
           
   <section class="section-padding section-bg" id="section_2">
            <div class="container">
                <div class="row">

                
               <?php 

            if($category_detail ){ 
               foreach($category_detail as $cd){ ?>
                <h1 class="text-center"><?php echo $cd->cat_name;?></h1>
                <div class="container-fluid bg-breadcrumb" >
                    <div class="container text-center py-3" style="max-width: 900px;">
                        <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                        </p>    
                    </div>
                </div>

              <?php }}else { ?>
               <p class="text-center">Oops! No article (s) found in this tag</p>


             <?php }  ?>

                

       
   <!--/Header Start -->

            <section class="section-padding" id="section_3">
                  <div class="container">
                     <div class="row">

                        <div class="col-lg-12 col-12 text-center ">
                            
                        </div>
                        <?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

           
                //  $bannercaption = get_post_meta($post->ID,'_bannercaption', true); ?>

                        <div class="col-lg-6 col-md-6 col-12 pb-5 mb-5 mb-lg-0">
                              <div class="custom-block-wrap">
                                 <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>"
                                    class="custom-block-image img-fluid" alt="<?php  the_title(); ?>">

                                 <div class="custom-block">
                                    <div class="custom-block-body">
                                          <h5 class="mb-3"><?php the_title(); ?></h5>

                                          <p> <?php echo wp_trim_words($post->post_content, 15); ?> </p>

                                    </div>

                                    <a href="<?php echo get_the_permalink($post->ID); ?>" class="custom-btn btn">Learn More</a>
                                 </div>
                              </div>
                        </div>
                        <?php endwhile; wp_reset_query(); ?>


                     

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
	