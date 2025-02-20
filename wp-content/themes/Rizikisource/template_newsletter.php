<?php
   /*
   Template Name: Newsletter Page
   */


   //dispaly tags and categroy in cloud
//    $args = array(
//     'taxonomy' => array( 'post_tag', 'category' ), 
// ); 






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
      <section class="news-section ">
        <div class="container">
         
            <div class="col-12"> 
            <div class="row">
   <?php
      $filteredtags = array();
               query_posts(array('post_type'=>'newsletter', 'order'=>'DESC', 'posts_per_page'=>-1));
                    if ( have_posts() ) while ( have_posts() ) : the_post();
      					$benefitags =get_the_tags();
      					if($benefitags) {
      				foreach($benefitags as $filtered)
      
      				{
      					$filteredtags[$filtered->name] = $filtered->term_taxonomy_id;
      				}
      
      			}   
      				// 
      			endwhile;  wp_reset_query();   
      			$sino=array_unique($filteredtags);
      
      			//  print_r($sino); 
      			//  exit; ?>

				

		<?php
      	if($sino){
            foreach($sino as $key=>$custom_term) {
      
      
          // wp_reset_query();
          $args = array('post_type' => 'newsletter',
              'tax_query' => array(
                  array(
                      'taxonomy' => 'post_tag',
                      'field' => 'term_taxonomy_id',
                      'terms' => $custom_term,
                  ),
              ),
           );
      
           $loop = new WP_Query($args);
      
			//  print_r($loop);
			//  exit;
		
           if($loop->have_posts())
      
      	 {?>

         <div class="col-sm-6 pt-3 bg-light">
            <h2><?php echo $key; ?> </h2>
            <?php
               while($loop->have_posts()) : $loop->the_post();
               $thelink=get_post_meta($post->ID, '_nas_file', true);	
               
               if(empty($thelink)){
               $thelink=get_post_meta($post->ID, '_thelink', true);
               } else {
               
               }?>
            <ul>
               <li>
                  <h5><i class="fa fa-file-pdf"> </i> <a href="<?php echo $thelink; ?>" target="_blank"> <?php echo  get_the_title(); ?></a></h5>
               </li>
               <?php endwhile; }?>
            </ul>
        
		</div>

		<?php } } ?>  
               
            

         
          </div>
        </div>
      </section> <?php get_footer(); ?>