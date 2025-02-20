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
                            <div class="custom-text-box">   
                         
                        <div class="shareit">
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
                 </div>
              
              <div class="comment-box">
                            <?php   // If comments are open or there is at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
            comments_template();
            }
            ?>
            </div>
                  
                            <?php endwhile; wp_reset_query(); ?>

                            <?php wpb_posts_nav(); ?>
                        </div>

                    </div>

                    <div class="col-lg-4 col-12 mx-auto mt-4 mt-lg-0">

<form role="search"class="" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <div class="row">
            <div class="col-10 d-flex justify-content-end">
         <input type="search"  class="form-control " aria-describedby="search-icon-1"  placeholder="keywords" name="s" id="searchbox" value="<?php echo esc_attr( get_search_query() ); ?>">
         </div>
         <div class="col-2 d-flex justify-content-end">
         <button type="submit" class="search-submit btn  border nput-group-text p-3"><i class="bi-search" style="color:#fd9600;"></i></button>
         </div>
         </div>
      </form>

  <h5 class="mt-5 mb-3">Most Viewed</h5>

  <?php

 
$mostviewed  = get_posts( array(
  'post_type' => 'post',
   'posts_per_page' => '3',
   'meta_key'      => 'views',
   'orderby'       => 'meta_value_num',
   'order'         => 'DESC'

    ) );


    foreach ($mostviewed as $post){
      $slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '1200x628');
  ?>

        <div class="news-block news-block-two-col d-flex mt-4">
            <div class="news-block-two-col-image-wrap">
            <a href="<?php echo get_the_permalink($post->ID); ?>">
            <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>" class="news-image img-fluid" alt="<?php echo $post->post_title; ?>">
            </a>
            </div>
            <div class="news-block-two-col-info">
            <div class="news-block-title mb-2">
                <h6>
                <a href="<?php echo get_the_permalink($post->ID); ?>" class="news-block-title-link"><?php echo $post->post_title; ?></a>
                </h6>
            </div>
            <div class="news-block-date">
                <p>
                <i class="bi-calendar4 custom-icon me-1"></i><?php echo $post->post_date; ?>
                </p>
            </div>
            </div>
        </div>
  <?php }

         wp_reset_query();
      ?>  

  <div class="category-block d-flex flex-column">
    <h5 class="mb-3">Categories</h5>

    <?php
$categories = get_categories();
foreach ( $categories as $category ) :
$category_link = get_category_link( $category->term_id );
 ?>
    <a href="<?php echo $category_link; ?>" class="category-block-link"> <?php echo $category->name; ?> <span class="badge"><?php echo $category->count ;?></span>
    </a>
    <?php
endforeach;
?>

  
  </div>
  <div class="tags-block">
    <h5 class="mb-3">Tags</h5>
    


  <?php  foreach(  $tags as $tag )
  {?>

    <a href="<?php echo get_tag_link($tag->term_id) ?>" class="tags-block-link"> <?php echo $tag->name; ?> </a>

<?php }?>
   
  </div>
  <!-- <form class="custom-form subscribe-form" action="#" method="post" role="form">
    <h5 class="mb-4">Newsletter Form</h5>
    <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required>
    <div class="col-lg-12 col-12">
      <button type="submit" class="form-control">Subscribe</button>
    </div>
  </form> -->
</div>
</div>
</div>
</section> <?php get_footer(); ?>