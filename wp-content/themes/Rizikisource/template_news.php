<?php
   /*
   Template Name: All Events Page
   */


   //dispaly tags and categroy in cloud
//    $args = array(
//     'taxonomy' => array( 'post_tag', 'category' ), 
// ); 



$args = array(
    'taxonomy' => array( 'post_tag' ), 
    'number'     => 5,
    'order'      => 'DESC',
); 

$tags = get_tags($args );


?> <?php get_header(); ?>


<!-- Header Start -->
<section class="section-padding-inner section-bg" id="section_2">
  <div class="container">
    <div class="row"> <?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                 $bannercaption = get_post_meta($post->ID,'_bannercaption', true); ?> <h1 class="text-center"> <?php the_title(); ?> </h1>
      <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-3" style="max-width: 900px;">
          <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"> <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?> </p>
        </div>
        <p> <?php the_content(); ?> </p>
      </div> <?php endwhile; wp_reset_query(); ?>
      <!--/Header Start -->
      <!-- Blog Start -->
      <section class="news-section">
        <div class="container">
          <div class="row">
            <div class="col-12 col-6-lg"> <?php 
                $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => '-1' ) );
                if ( $loop->have_posts() ) :
                 while ( $loop->have_posts() ) : $loop->the_post();
                        // get all of the terms for this post, with the taxonomy of categories-projets.
                  $terms = get_the_terms( $post->ID, 'post_tag' );
                  $slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '1200x628');
                  $gallery = get_post_meta($post->ID, '_newsgallery', false);
                  if ($terms) {
                  foreach ( $terms as $term ) {
                    //  echo $term->name; //Display all terms
                 $category = $term->name;
                            }
                                } else  {

                             $category = 'Rizik Source';

                            }
                     ?> 
                <div class="divmore news-block">
                    <div class="news-block-top">
                    <a href="<?php echo get_the_permalink($post->ID); ?>">
                        <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>" class="news-image img-fluid" alt="<?php echo $post->post_title; ?>">
                    </a> 
                    
                    <div class="news-category-block">
                    <?php if ($terms) {
                    $i = 0;
                        $len = count($terms);

                        foreach ( $terms as $term ) {
                                        //Display all terms
                        ?> 
                        <a href="#!" class="category-block-link">
                        <?php

                        if ($i >= 0 && ($i != $len - 1) ) {

                            echo $category = $term->name . ',';
                            // first
                        } 
                        
                        if ($i == $len - 1) {
                            // last

                            echo $category = $term->name;
                        }

                        ?> </a> 
                        <?php $i++;   }  }
                        else  { ?> 
                        <a href="#" class="category-block-link"> <?php echo  $category = 'Rizik Source'; ?> </a> 
                        <?php  }?>
                    </div>

                    
                    </div>
                    <div class="news-block-info">
                    <div class="d-flex mt-2">
                        <div class="news-block-date">
                        <p>
                            <i class="bi-calendar4 custom-icon me-1"></i> <?php echo $post->post_date; ?>
                        </p>
                        </div>
                        <div class="news-block-author mx-5">
                        <p>
                            <i class="bi-person custom-icon me-1"></i> <?php the_author_meta( 'user_nicename' , $post->post_author ); ?>
                        </p>
                        </div>
                        <!-- <div class="news-block-comment"><p><i class="bi-chat-left custom-icon me-1"></i>
                                                32 Comments
                                            </p></div> -->
                    </div>
                    <div class="news-block-title mb-2">
                        <h4>
                        <a href="<?php echo get_the_permalink($post->ID); ?>" class="news-block-title-link"> <?php echo $post->post_title; ?> </a>
                        </h4>
                    </div>
                    <div class="news-block-body">
                        <p> <?php echo wp_trim_words($post->post_content, 15);  ?> </p>
                    </div>





                    </div>
                </div> 
              <?php 
                     endwhile;
                     wp_reset_query();
                     endif;?>  
                     <div class="row">
                     <span class="col d-flex justify-content-start">
               <a href="#" id="loadMore">Load More</a>

               </span>

               <span class="col d-flex justify-content-end">
              <p class="totop">
                <a href="#top">Back to top</a>
              </p>
                    </span>
                    </div>
            </div>

            
          </div>
        </div>
      </section> <?php get_footer(); ?>