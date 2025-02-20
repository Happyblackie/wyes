<?php
   /*
   Template Name: Gallery Page
   */
   ?>
<?php 
global $post; 

$mainSlug= $post->post_name;


?>

<?php get_header(); ?>

<section class="section-padding-md-2">
      <div class="content-csr inner-pages">
<?php
   if (have_posts()) while (have_posts()) : the_post();
   	$banner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '1170X392');
   	if (!empty($banner)) 
       $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
       {
           
   		?>

               <h1><?php the_title(); ?></h1>
               <div class="border"></div>
               
   


         <?php
            query_posts(array('post_type'=>'csr', 'posts_per_page'=>-1));
            if ( have_posts() ) while ( have_posts() ) : the_post();
            $simg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
            $fa= get_post_meta( $post->ID, '_fa', true );
            $gallery = get_post_meta($post->ID, '_csrgallery', false);
            $post_slug = get_post_field( 'post_name', get_post() );
              $post_name_id = get_post_field( 'ID', get_post() );
              $post_title = get_post_field( 'post_title', get_post() );
            ?>
         <div class="" id="<?php echo $post_slug ?>">
            <div class="">
            <?php

if( $mainSlug  == 'csr') { ?>

   <!-- do your stuff here -->
   <h2> <?php the_title(); ?></h2>
               <p><?php the_content(); ?></p>

<?php } ?>




            
            </div>
         </div>

<!--          
         <div class="portfolio-menu mt-2 mb-4">
            <ul>
               <li class="btn btn-outline-dark active" data-filter="*">All</li>
               <li class="btn btn-outline-dark" data-filter=".<?php $post_name_id; ?>"><?php  $post_title; ?></li>
            </ul>
         </div> -->
         <div class="portfolio-item row">

         <?php    if(!empty($gallery)){
              
               
               foreach($gallery as $thumb_id){
          
                
               $thumb=wp_get_attachment_image_src( $thumb_id, 'full');
               $img=wp_get_attachment_image_src( $thumb_id, '404X288');
               
               ?>
            <div class="item <?php echo $post_name_id; ?> col-lg-3 col-md-4 col-6 col-sm">
               <a href="<?php echo  $thumb[0] ?>" class="fancylight popup-btn" data-fancybox-group="light"> 
               <img class="img-fluid" src="<?php echo  $img[0] ?>" alt="">
               </a>
            </div>

            <?php  } }?>
         </div>

         <?php endwhile; wp_reset_query(); ?>

      </div>
   
      </div>
    
   </div>
   
</section>
<!-- Projects Area End Here -->

<?php } ?>
<?php endwhile; wp_reset_query();// end of the loop. ?>
<?php get_footer(); ?>



 


      <script>
      //  csr

// $('.portfolio-item').isotope({
  //  	itemSelector: '.item',
  //  	layoutMode: 'fitRows'
  //  });
  $('.portfolio-menu ul li').click(function(){
    $('.portfolio-menu ul li').removeClass('active');
    $(this).addClass('active');
    
    var selector = $(this).attr('data-filter');
    $('.portfolio-item').isotope({
      filter:selector
    });
    return  false;
  });
  $(document).ready(function() {
  var popup_btn = $('.popup-btn');
  popup_btn.magnificPopup({
  type : 'image',
  gallery : {
    enabled : true
  }
  });
  });

</script>
